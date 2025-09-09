@props([
    'showTitle' => true,
    'title' => 'Ikuti Kami',
    'subtitle' => 'Ikuti media sosial kami untuk informasi terbaru',
    'class' => '',
    'size' => 'normal' // normal, small, large
])

@php
    $socialMedia = \App\Helpers\SettingsHelper::get('social_media', []);
    $villageName = \App\Helpers\SettingsHelper::get('village_name', 'Desa Tetembomua');
    $contactPhone = \App\Helpers\SettingsHelper::get('contact_phone', '+62 812-3456-7890');
    
    // Size classes
    $iconSize = match($size) {
        'small' => 'fa-2x',
        'large' => 'fa-4x',
        default => 'fa-3x'
    };
    
    $cardClass = match($size) {
        'small' => 'col-md-2 col-4 mb-3',
        'large' => 'col-md-3 col-6 mb-4',
        default => 'col-md-3 col-6 mb-4'
    };
@endphp

<div class="social-media-section {{ $class }}">
    @if($showTitle)
        <div class="section-title text-center mb-4">
            <h2>{{ $title }}</h2>
            <p class="text-muted">{{ $subtitle }}</p>
        </div>
    @endif
    
    <div class="row text-center">
        <!-- Facebook -->
        <div class="{{ $cardClass }}">
            <a href="{{ $socialMedia['facebook'] ?? '#' }}" 
               class="text-decoration-none social-link" 
               target="_blank" 
               rel="noopener"
               title="Follow us on Facebook">
                <div class="card h-100 social-card">
                    <div class="card-body">
                        <i class="fab fa-facebook {{ $iconSize }} text-primary mb-3"></i>
                        <h6>Facebook</h6>
                        <small class="text-muted">
                            {{ $socialMedia['facebook_handle'] ?? str_replace(' ', '', $villageName) }}
                        </small>
                    </div>
                </div>
            </a>
        </div>
        
        <!-- Instagram -->
        <div class="{{ $cardClass }}">
            <a href="{{ $socialMedia['instagram'] ?? '#' }}" 
               class="text-decoration-none social-link" 
               target="_blank" 
               rel="noopener"
               title="Follow us on Instagram">
                <div class="card h-100 social-card">
                    <div class="card-body">
                        <i class="fab fa-instagram {{ $iconSize }} text-danger mb-3"></i>
                        <h6>Instagram</h6>
                        <small class="text-muted">
                            {{ $socialMedia['instagram_handle'] ?? str_replace(' ', '', strtolower($villageName)) }}
                        </small>
                    </div>
                </div>
            </a>
        </div>
        
        <!-- YouTube -->
        <div class="{{ $cardClass }}">
            <a href="{{ $socialMedia['youtube'] ?? '#' }}" 
               class="text-decoration-none social-link" 
               target="_blank" 
               rel="noopener"
               title="Subscribe to our YouTube channel">
                <div class="card h-100 social-card">
                    <div class="card-body">
                        <i class="fab fa-youtube {{ $iconSize }} text-danger mb-3"></i>
                        <h6>YouTube</h6>
                        <small class="text-muted">
                            {{ $socialMedia['youtube_handle'] ?? $villageName }}
                        </small>
                    </div>
                </div>
            </a>
        </div>
        
        <!-- WhatsApp -->
        <div class="{{ $cardClass }}">
            <a href="{{ $socialMedia['whatsapp'] ?? '#' }}" 
               class="text-decoration-none social-link" 
               target="_blank" 
               rel="noopener"
               title="Contact us on WhatsApp">
                <div class="card h-100 social-card">
                    <div class="card-body">
                        <i class="fab fa-whatsapp {{ $iconSize }} text-success mb-3"></i>
                        <h6>WhatsApp</h6>
                        <small class="text-muted">
                            {{ $socialMedia['whatsapp_number'] ?? $contactPhone }}
                        </small>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<style>
.social-card {
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
    border-radius: 15px;
    background: #fff;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.social-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    border-color: var(--primary-green, #2E8B57);
}

.social-link:hover {
    text-decoration: none !important;
}

.social-link:hover .social-card {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.social-card .card-body {
    padding: 1.5rem;
}

.social-card h6 {
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #333;
}

.social-card small {
    font-size: 0.85rem;
    color: #6c757d;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .social-card .card-body {
        padding: 1rem;
    }
    
    .social-card h6 {
        font-size: 0.9rem;
    }
    
    .social-card small {
        font-size: 0.8rem;
    }
}
</style>
