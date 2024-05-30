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

<div class="space-y-4">
    <x-form.section label="Základní informace">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 mb-8">
            <x-form.input type="text" label="Vaše jméno" name="name" value="" autofocus required />
            <x-form.input type="text" label="E-mail" name="mail" value="" required />
        </div>

        <div class="mb-8">
            <x-form.textarea label="Zpráva" name="message" value="" rows="8" required />
        </div>
    </x-form.section>

    <x-form.section label="Technické informace" description="Pro účely opravení chyby jsou mi nápomocné následující informace o Vašem zařízení a prohlížeči.">
        <div x-data="browserInfo()" x-init="getInfo()">
            <x-form.textarea label="Informace" name="techinfo" value="" rows="4" x-text="techinfo" />
        </div>
    </x-form.section>
</div>
