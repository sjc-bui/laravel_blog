<span class="set-lang">
    @foreach ($available_locales as $locale_name => $available_locale)
        @if ($available_locale === $current_locale)
            <span class="text-gray-700 locale-name">{{ $locale_name }}</span>
        @else
            <a class="locale-name" href="/language/{{ $available_locale }}">
                <span>{{ $locale_name }}</span>
            </a>
        @endif
    @endforeach
</span>
