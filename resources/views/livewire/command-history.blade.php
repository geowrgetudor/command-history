<x-pulse::card :cols="$cols" :rows="$rows" :class="$class">
    <x-pulse::card-header name="{{ __('Artisan commands history') }}">
        <x-slot:icon>
            <x-dynamic-component :component="'pulse::icons.sparkles'" />
        </x-slot:icon>
    </x-pulse::card-header>

    <x-pulse::scroll :expand="$expand" wire:poll.5s="">
        @if ($executedCommands->isEmpty())
            <x-pulse::no-results />
        @else
            <x-pulse::table>
                <colgroup>
                    <col width="100%" />
                    <col width="0%" />
                    <col width="0%" />
                </colgroup>
                <x-pulse::thead>
                    <tr>
                        <x-pulse::th>{{ __('Command') }}</x-pulse::th>
                        <x-pulse::th class="text-right">{{ __('Status') }}</x-pulse::th>
                        <x-pulse::th class="text-right">{{ __('Count') }}</x-pulse::th>
                    </tr>
                </x-pulse::thead>
                <tbody>
                    @foreach ($executedCommands as $key => $command)
                        <tr class="h-2 first:h-0"></tr>
                        <tr wire:key="{{ $key }}">
                            <x-pulse::td class="max-w-[1px]">
                                <code class="block text-xs text-gray-900 dark:text-gray-100 truncate"
                                    title="{{ $command->name }}">
                                    {{ $command->name }}
                                </code>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400 truncate" title="">
                                    {{ __('Arguments: :arguments', ['arguments' => $command->arguments]) }}
                                </p>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400 truncate" title="">
                                    {{ __('Options: :options', ['options' => $command->options]) }}
                                </p>
                            </x-pulse::td>
                            <x-pulse::td numeric class="text-gray-700 dark:text-gray-300 font-bold">
                                {{ $command->statusCode ? __('Fail') : __('Success') }}
                            </x-pulse::td>
                            <x-pulse::td numeric class="text-gray-700 dark:text-gray-300 font-bold">
                                {{ (int) $command->count }}
                            </x-pulse::td>
                        </tr>
                    @endforeach
                </tbody>
            </x-pulse::table>
        @endif
    </x-pulse::scroll>
</x-pulse::card>
