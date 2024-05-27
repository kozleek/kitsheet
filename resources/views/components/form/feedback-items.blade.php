@props(['kit' => null])

<div class="space-y-4">
    <x-form.section label="Základní informace">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 mb-8">
            <x-form.input type="text" label="Vaše jméno" name="name" value="" autofocus required />
            <x-form.input type="text" label="E-mail" name="mail" value="" required />
        </div>

        <div>
            <x-form.textarea label="Zpráva" name="message" value="" rows="8" required />
        </div>
    </x-form.section>
</div>
