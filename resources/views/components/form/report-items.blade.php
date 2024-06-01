@props(['kit' => null])


<script>
    function browserInfo() {
        return {
            info: '',
            getInfo() {
                this.techinfo = `Prohlížeč: ${navigator.userAgent}\n`;
                this.techinfo += `Rozlišení obrazovky: ${window.screen.width} x ${window.screen.height}px\n`;
                this.techinfo += `Velikost okna: ${window.innerWidth} x ${window.innerHeight}px\n`;
            }
        }
    }
</script>

<div class="space-y-8">
    <x-form.section label="Základní informace">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 mb-8">
            <x-form.input type="text" label="Vaše jméno" name="name" value="" autofocus required />
            <x-form.input type="text" label="E-mail" name="mail" value="" required />
        </div>

        <div class="mb-8">
            <x-form.textarea label="Zpráva" name="message" value="" rows="8" required />
        </div>

        <div class="mb-8">
            <div class="flex items-center justify-center w-full">
                <label for="attachment" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input name="attachment" id="attachment" type="file" class="hidden" />
                </label>
            </div>
        </div>
    </x-form.section>

    <x-form.section label="Technické informace" description="Pro účely opravení chyby jsou mi nápomocné následující informace o Vašem zařízení a prohlížeči.">
        <div x-data="browserInfo()" x-init="getInfo()">
            <x-form.textarea label="Informace" name="techinfo" value="" rows="4" x-text="techinfo" />
        </div>
    </x-form.section>
</div>
