<x-app-layout :title="$title">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="#" onclick="window.history.back();" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Ekstra</a></div>
                <div class="breadcrumb-item">Pengaturan</div>
                <div class="breadcrumb-item">Umum</div>
            </div>
        </div>
        <div class="section-body">
            <form id="setting-form">
                <livewire:general-setting :setting="$setting" :levels="$levels" />
            </form>
        </div>
    </section>
</x-app-layout>