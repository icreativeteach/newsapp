<table class='sw-text-editor-table' style='border: 1px solid black; border-collapse: collapse;'>
    <thead class='sw-text-editor-table__head' style='border: 1px solid black; border-collapse: collapse;'>
    <tr class='sw-text-editor-table__row'>
        @foreach ($orderListConfiguration['header'] as $head => $value)
        <td class='sw-text-editor-table__col' style='border: 1px solid black; border-collapse: collapse;'>
            {{ $head }}
            <div class='sw-text-editor-table__col-selector' contenteditable='false'></div>
        </td>
        @endforeach
    </tr>
    </thead>

    <tbody class='sw-text-editor-table__body'>
    @foreach ($orderListConfiguration['lineItems'] as $lineItem)
        <tr class='sw-text-editor-table__row'>
        @foreach ($orderListConfiguration['header'] as $key)
            <td class='sw-text-editor-table__col' style='border: 1px solid black; border-collapse: collapse;'>
            {{ $lineItem[$key] }}
        </td>
        @endforeach
    </tr>
    @endforeach
    </tbody>
</table>
