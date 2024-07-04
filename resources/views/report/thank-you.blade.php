@extends('layouts.kit')

@section('content')
    <x-page.content>
        <div class="space-y-2">
            {!! __('report.thank_you.text') !!}
        </div>
        @if($report->message)
            <div class="my-8 p-4 bg-neutral-100 rounded-md">
                <h2 class="text-lg font-semibold mb-2">{{ $report->name }} {{ __('report.thank_you.wrote') }}:</h2>
                <p>{{ $report->message }}</p>
            </div>

            @if($report->techinfo)
                <div class="mb-8 p-4 bg-neutral-100 rounded-md">
                    <h2 class="text-lg font-semibold mb-2">
                        {{ __('report.thank_you.tech_info') }}
                    </h2>
                    <pre class="text-sm">{{ $report->techinfo }}</pre>
                </div>
            @endif
        @endif

        <x-button icon="heroicon-o-chevron-left" href="{{ route('kit.create') }}">
            {{ __('report.thank_you.back_button') }}
        </x-button>
    </x-page.content>
@endsection
