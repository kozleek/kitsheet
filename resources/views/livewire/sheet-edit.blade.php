<div>
    @if (!$sheet->is_finished)
        <div class="mb-8">
            <x-form.text label="Název pracovního listu (např. jméno)" name="name" change="store" />
        </div>
    @else
        @if ($sheet->name)
            <div class="mb-8">
                <p class="text-lg">Jméno: {{ $sheet->name }}</p>
            </div>
        @endif
    @endif
</div>
