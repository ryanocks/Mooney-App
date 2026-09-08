<x-app-layout>
    <section class="relative w-full py-space-3xl lg:py-space-4xl overflow-hidden">
        <div class="pointer-events-none absolute top-10 left-1/2 -translate-x-1/2 w-[720px] h-[520px] bg-gradient-to-b from-primary-container/15 via-secondary-container/10 to-transparent rounded-full blur-[140px]"></div>

        <div class="max-w-[1280px] mx-auto px-gutter-mobile lg:px-gutter-desktop relative z-10">
            <!-- Header Section -->
            <div class="mb-space-2xl text-center max-w-3xl mx-auto">
                <div class="inline-block px-space-sm py-1 rounded-full bg-primary-container/20 text-primary font-mono-code text-label-sm uppercase tracking-wider mb-space-sm border border-primary/20">
                    {{ $project['acf']['project_type'] ?? 'Project Showcase' }}
                </div>
                <h1 class="font-headline-xl text-3xl sm:text-headline-xl text-on-surface font-extrabold tracking-tight mb-space-xs">
                    {{ $project['title']['rendered'] ?? 'Untitled Project' }}
                </h1>
                <p class="font-body-lg text-on-surface-variant">
                    Finished Year: <span class="text-tertiary font-mono-code">{{ $project['acf']['finished_year'] ?? '-' }}</span>
                </p>
            </div>

            <!-- Project Card & Image -->
            <div class="max-w-4xl mx-auto rounded-2xl bg-surface-container-low border border-outline-variant/30 p-space-xl lg:p-space-2xl shadow-2xl backdrop-blur-md">
                
                <!-- Bagian Gambar Project -->
@if(!empty($imageUrl))
    <div class="w-full h-80 lg:h-[420px] rounded-xl overflow-hidden mb-space-xl border border-outline-variant/20 bg-surface-container-high">
        <img 
            src="{{ $imageUrl }}" 
            alt="{{ $project['title']['rendered'] ?? 'Project Image' }}" 
            class="w-full h-full object-cover"
            referrerpolicy="no-referrer"
        >
    </div>
@endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-space-xl mb-space-xl">
                    <!-- Overview -->
                    <div>
                        <h3 class="font-headline-sm text-on-surface font-bold mb-space-xs">Overview</h3>
                        <p class="font-body-md text-on-surface-variant leading-relaxed">
                            {{ $project['acf']['overview'] ?? 'No overview provided.' }}
                        </p>
                    </div>

                    <!-- Tech Stack & Role -->
                    <div class="flex flex-col gap-space-md bg-surface-container-high/50 p-space-md rounded-xl border border-outline-variant/20">
                        <div>
                            <span class="block font-label-sm text-on-surface-variant font-semibold uppercase tracking-wider mb-1">Role</span>
                            <span class="font-mono-code text-primary font-medium">{{ $project['acf']['role'] ?? '-' }}</span>
                        </div>
                        <div>
                            <span class="block font-label-sm text-on-surface-variant font-semibold uppercase tracking-wider mb-1">Tech Stack</span>
                            <div class="flex flex-wrap gap-1">
                                @php
                                    $stacks = array_filter(explode(',', $project['acf']['tech_stack'] ?? ''));
                                @endphp
                                @forelse($stacks as $stack)
                                    <span class="px-space-xs py-0.5 rounded-md bg-surface-container-high border border-outline-variant/30 text-secondary font-mono-code text-[12px]">
                                        {{ trim($stack) }}
                                    </span>
                                @empty
                                    <span class="text-on-surface-variant font-mono-code text-[12px]">-</span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                @if(!empty($project['acf']['url']))
                    <div class="pt-space-md border-t border-outline-variant/20 flex justify-end">
                        <a href="{{ $project['acf']['url'] }}" target="_blank" class="inline-flex items-center gap-space-xs px-space-lg py-space-sm rounded-lg bg-primary text-on-primary font-label-md font-semibold transition-all hover:-translate-y-0.5 shadow-md">
                            <span>Visit Live Project</span>
                            <span class="material-symbols-outlined text-[18px]">open_in_new</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-app-layout>