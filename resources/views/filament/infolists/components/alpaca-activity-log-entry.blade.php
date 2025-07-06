<x-dynamic-component
    :component="$getEntryWrapperView()"
    :entry="$entry"
>
    <div {{ $getExtraAttributeBag() }}>
        <div class="fi-in-entry-content-col">
            <table class="fi-in-key-value">
                <thead>
                    <th class="col">
                        {{ __('alpaca-activitylog::alpaca-activitylog.activities.table.field') }}
                    </th>
                    <th class="col">
                        {{ __('alpaca-activitylog::alpaca-activitylog.activities.table.old') }}
                    </th>
                    <th class="col">
                        {{ __('alpaca-activitylog::alpaca-activitylog.activities.table.new') }}
                    </th>
                </thead>
                <tbody>
                @foreach (data_get($record, 'properties.attributes', []) as $field => $change)
                    @php
                        $oldValue = data_get($record, 'properties.old.'.$field, '');
                        $newValue = data_get($record, 'properties.attributes.'.$field, '');
                    @endphp
                    <tr>
                        <td class="fi-in-placeholder">
                            {{ $field }}
                        </td>
                        <td width="40%" class="fi-in-placeholder">
                            @if(is_array($oldValue))
                                <pre class="text-xs">{{ json_encode($oldValue, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
                            @else
                                {{ $oldValue }}
                            @endif
                        </td>
                        <td width="40%" class="fi-in-placeholder">
                            @if (is_bool($newValue))
                                <span class="text-xs text-gray-600">{{ $newValue ? 'true' : 'false' }}</span>
                            @elseif(is_array($newValue))
                                <pre class="text-xs text-gray-600">{{ json_encode($newValue, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
                            @else
                                {{ $newValue }}
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dynamic-component>
