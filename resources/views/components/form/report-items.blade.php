@props(['kit' => null])

<script>
    function browserInfo() {
        return {
            info: '',
            getInfo() {
                this.techinfo = `{{ __('report.debug.browser') }} ${navigator.userAgent}\n`;
                this.techinfo += `{{ __('report.debug.resolution') }} ${window.screen.width} x ${window.screen.height}px\n`;
                this.techinfo += `{{ __('report.debug.window_size') }} ${window.innerWidth} x ${window.innerHeight}px\n`;
            }
        }
    }
</script>

<div class="space-y-4">
    <x-form.section label="{{ __('report.form.section_1.label') }}">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 mb-8">
            <x-form.input type="text" label="{{ __('report.form.name') }}" name="name" value="" autofocus required />
            <x-form.input type="text" label="{{ __('report.form.email') }}" name="mail" value="" required />
        </div>

        <div class="mb-8">
            <x-form.textarea label="{{ __('report.form.message') }}" name="message" value="" rows="8" required />
        </div>
    </x-form.section>

    <x-form.section label="{{ __('report.form.section_2.label') }}" description="{{ __('report.form.section_2.description') }}">
        <div x-data="browserInfo()" x-init="getInfo()">
            <x-form.textarea label="{{ __('report.form.info') }}" name="techinfo" value="" rows="4" x-text="techinfo" />
        </div>
    </x-form.section>
</div>
