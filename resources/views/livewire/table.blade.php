<tbody x-data>
    @foreach ($list as $watcher)
    <tr wire:key="{{ $watcher->id }}" class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }}">
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 max-w-1/2 truncate">
            <a href="{{ $watcher->url }}" target="_blank">{{ $watcher->url }}</a>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
            $watcher->selector }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $watcher->price }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <button @click="confirm('Are you sure?') && $wire.remove({{ $watcher->id }})"
                class="text-red-600 hover:text-red-800">Remove</button>
        </td>
    </tr>
    @endforeach
</tbody>
