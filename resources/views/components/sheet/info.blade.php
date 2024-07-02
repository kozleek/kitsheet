<div class="py-4 flex justify-center md:justify-start print:justify-start gap-8 relative">
    <div>
        <div class="block md:hidden print:hidden">
            {!! QrCode::size(250)->generate(route('sheet.show', $sheet)) !!}
        </div>
        <div class="hidden md:block print:block">
            {!! QrCode::size(150)->generate(route('sheet.show', $sheet)) !!}
        </div>
    </div>
    <div class="hidden md:flex print:flex flex-col justify-between">
        <div>
            <h2 class="font-bold text-xl">
                {{ __('sheet.header.title')}} {{ $sheet->code }}
            </h2>
            <div class="-mt-3">
                <x-info.sheet :kit="$sheet->kit" />
            </div>
        </div>
        <div>
            <p class="text-xs font-sometype">
                @if($sheet->fingerprint != '')
                    {{ route('sheet.fingerprint', ['fingerprint' => $sheet->fingerprint]) }}
                @else
                    {{ route('sheet.show', $sheet) }}
                @endif
            </p>
        </div>
    </div>
</div>
