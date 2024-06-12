<div class="py-4 flex gap-8 relative">
    <div>
        {!! QrCode::size(150)->generate(route('sheet.show', $sheet)) !!}
    </div>
    <div class="flex flex-col justify-between">
        <div>
            <h2 class="font-bold text-xl">Pracovní list č. {{ $sheet->code }}</h2>
            <div class="-mt-3">
                <x-info.sheet :kit="$sheet->kit" />
            </div>
        </div>
        <div>
            <p class="text-xs text-neutral-400 font-sometype">
                @if($sheet->fingerprint != '')
                    {{ route('sheet.fingerprint', ['fingerprint' => $sheet->fingerprint]) }}
                @else
                    {{ route('sheet.show', $sheet) }}
                @endif
            </p>
        </div>
    </div>
</div>
