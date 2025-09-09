<?php

namespace App\Services;

use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExcelNormalizationService
{
    /**
     * Normalize an uploaded Excel file: unmerge, forward-fill, flatten headers, and produce rows.
     *
     * @param string $filePath Absolute path to uploaded Excel file
     * @param array $options Optional settings: sheet_index, header_rows
     * @return array{headers: array<int,string>, rows: array<int,array<string,mixed>>}
     */
    public function normalize(string $filePath, array $options = []): array
    {
        $reader = IOFactory::createReaderForFile($filePath);
        $reader->setReadDataOnly(false);
        $spreadsheet = $reader->load($filePath);

        $sheetIndex = $options['sheet_index'] ?? 0;
        $sheet = $spreadsheet->getSheet($sheetIndex);

        $this->expandMergedCells($sheet);

        // Detect header row (first non-empty row with >= 3 non-empty cells)
        $highestRow = $sheet->getHighestDataRow();
        $highestColumn = $sheet->getHighestDataColumn();
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

        $headerRowIndex = $this->detectHeaderRowIndex($sheet, $highestRow, $highestColumnIndex);
        $rawHeaders = $this->readRow($sheet, $headerRowIndex, $highestColumnIndex);
        $headers = $this->normalizeHeaders($rawHeaders);

        // Forward-fill key columns commonly merged in KK datasets
        $keyColumns = $this->guessKeyColumns($headers, ['no_kk','alamat','tanggal_kk_dikeluarkan','alamat_kartu_keluarga']);
        $rows = [];
        for ($row = $headerRowIndex + 1; $row <= $highestRow; $row++) {
            $values = $this->readRow($sheet, $row, $highestColumnIndex);
            if ($this->isRowEmpty($values)) {
                continue;
            }
            $assoc = $this->combineRow($headers, $values);
            $rows[] = $assoc;
        }

        // Forward-fill key columns down the table
        foreach ($keyColumns as $col) {
            $last = null;
            foreach ($rows as $i => $r) {
                if (isset($r[$col]) && $this->hasValue($r[$col])) {
                    $last = $r[$col];
                } else {
                    if ($last !== null) {
                        $rows[$i][$col] = $last;
                    }
                }
            }
        }

        return [
            'headers' => $headers,
            'rows' => $rows,
        ];
    }

    private function expandMergedCells(Worksheet $sheet): void
    {
        $merged = $sheet->getMergeCells();
        foreach ($merged as $range) {
            $startCell = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::extractAllCellReferencesInRange($range)[0];
            $value = $sheet->getCell($startCell)->getValue();
            foreach (\PhpOffice\PhpSpreadsheet\Cell\Coordinate::extractAllCellReferencesInRange($range) as $cellRef) {
                $sheet->setCellValue($cellRef, $value);
            }
            $sheet->unmergeCells($range);
        }
    }

    private function detectHeaderRowIndex(Worksheet $sheet, int $highestRow, int $highestColumnIndex): int
    {
        for ($row = 1; $row <= $highestRow; $row++) {
            $values = $this->readRow($sheet, $row, $highestColumnIndex);
            $nonEmpty = 0;
            foreach ($values as $v) {
                if ($this->hasValue($v)) $nonEmpty++;
            }
            if ($nonEmpty >= 3) {
                return $row;
            }
        }
        return 1;
    }

    private function readRow(Worksheet $sheet, int $row, int $highestColumnIndex): array
    {
        $values = [];
        for ($col = 1; $col <= $highestColumnIndex; $col++) {
            $cell = $sheet->getCellByColumnAndRow($col, $row);
            $values[] = $cell ? $cell->getCalculatedValue() : null;
        }
        return $values;
    }

    private function normalizeHeaders(array $raw): array
    {
        $headers = [];
        foreach ($raw as $name) {
            $name = is_string($name) ? trim($name) : '';
            $name = preg_replace('/\s+/', ' ', $name);
            $snake = Str::of($name)
                ->lower()
                ->replace(['.', '/', '\\'], ' ')
                ->replace('&', ' dan ')
                ->replace('-', ' ')
                ->replace(':', '')
                ->replace('kk dikeluarkan pada tanggal', 'tanggal_kk_dikeluarkan')
                ->replace('no kk', 'no_kk')
                ->snake();
            $headers[] = (string)$snake;
        }
        // Ensure headers unique
        $seen = [];
        foreach ($headers as $i => $h) {
            if (!isset($seen[$h])) { $seen[$h] = 0; continue; }
            $seen[$h]++;
            $headers[$i] = $h.'_'.$seen[$h];
        }
        return $headers;
    }

    private function combineRow(array $headers, array $values): array
    {
        $row = [];
        $count = min(count($headers), count($values));
        for ($i = 0; $i < $count; $i++) {
            $row[$headers[$i]] = $values[$i];
        }
        return $row;
    }

    private function guessKeyColumns(array $headers, array $preferred): array
    {
        $keys = [];
        foreach ($preferred as $p) {
            if (in_array($p, $headers, true)) {
                $keys[] = $p;
            }
        }
        return $keys;
    }

    private function isRowEmpty(array $values): bool
    {
        foreach ($values as $v) {
            if ($this->hasValue($v)) return false;
        }
        return true;
    }

    private function hasValue($v): bool
    {
        if ($v === null) return false;
        if (is_string($v)) return trim($v) !== '';
        if (is_numeric($v)) return true;
        if (is_bool($v)) return true;
        return !empty($v);
    }
}


