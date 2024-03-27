<div class="flex flex-col gap-y-6">
    @if ($messageBag->isNotEmpty())
        @foreach($messageBag->all() as $value)
            <p class="fi-fo-field-wrp-error-message text-danger-600 dark:text-danger-400">{{ __($value) }}</p>
        @endforeach
    @endif

    @if (count($providers))
        <div class="grid @if(count($providers) > 1) grid-cols-2 @endif gap-4">
            @foreach($providers as $key => $provider)
                <x-filament::button
                    :color="$provider['color'] ?? 'gray'"
                    :outlined="$provider['outlined'] ?? true"
                    :icon="$provider['icon'] ?? null"
                    tag="a"
                    :href="route($socialiteRoute, $key)"
                    :spa-mode="false"
                >
                    {{ $provider['label'] }}
                </x-filament::button>
            @endforeach
        </div>
    @else
        <span></span>
    @endif
</div>
