@props(['label', 'name'])

<label class="block mt-2 mb-1 text-xs font-bold uppercase">{{ $label }}</label>
<div @click.away="closeListbox()" @keydown.escape="closeListbox()" class="relative mt-1">
    <span class="inline-block w-full rounded-md shadow-sm">
        <button type="button" x-ref="button" @click="toggleListboxVisibility()" :aria-expanded="open"
            aria-haspopup="listbox"
            class="relative z-0 w-full py-3 pl-3 pr-10 text-left transition duration-150 ease-in-out bg-white border rounded shadow cursor-default focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 @error($name) border-red-500 @enderror">
            <span x-show="! open" x-text="value in options ? options[value].name : placeholder"
                :class="{ 'text-gray-500 my-2': !(value in options) }" class="block text-xs truncate"></span>

            <input x-ref="search" x-show="open" x-model="search" @keydown.enter.stop.prevent="selectOption()"
                @keydown.arrow-up.prevent="focusPreviousOption()" @keydown.arrow-down.prevent="focusNextOption()"
                type="search" class="w-full h-full border-none form-control focus:outline-none" />

            {{-- value is here :) --}}
            <input type="hidden" x-ref="selected" {{ $attributes }}>

            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                    <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg>
            </span>
        </button>
    </span>

    <div x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="absolute z-10 w-full mt-1 bg-white rounded-md shadow-lg"
        style="display: none;">
        <ul x-ref="listbox" @keydown.enter.stop.prevent="selectOption()"
            @keydown.arrow-up.prevent="focusPreviousOption()" @keydown.arrow-down.prevent="focusNextOption()"
            role="listbox" :aria-activedescendant="focusedOptionIndex ? name + 'Option' + focusedOptionIndex : null"
            tabindex="-1"
            class="py-1 overflow-auto text-base leading-6 rounded-md shadow-xs scroll-component max-h-60 focus:outline-none sm:text-sm sm:leading-5">
            <template x-for="(key, index) in Object.keys(options)" :key="index">
                <li :id="name + 'Option' + focusedOptionIndex" @click="selectOption()"
                    @mouseenter="focusedOptionIndex = index" @mouseleave="focusedOptionIndex = null" role="option"
                    :aria-selected="focusedOptionIndex === index"
                    :class="{ 'text-white bg-indigo-600': index === focusedOptionIndex, 'text-gray-900': index !== focusedOptionIndex }"
                    class="relative py-2 pl-3 text-gray-900 cursor-default select-none pr-9">
                    <span x-text="options[index].name"
                        :class="{ 'font-semibold': index === focusedOptionIndex, 'font-normal': index !== focusedOptionIndex }"
                        class="block font-normal truncate"></span>

                    <span x-show="key === value"
                        :class="{ 'text-white': index === focusedOptionIndex, 'text-indigo-600': index !== focusedOptionIndex }"
                        class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">
                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </li>
            </template>

            <div x-show="! Object.keys(options).length" x-text="emptyOptionsMessage"
                class="px-3 py-2 text-gray-900 cursor-default select-none"></div>
        </ul>
    </div>
</div>
@error($name)
    <x-inputs.error :message="$message" />
@enderror

@push('scripts')
    <script type="text/javascript">
        function select(config) {
            return {
                url: config.url,
                data: config.data,
                wireModel: '{{ $name }}',
                emptyOptionsMessage: config.emptyOptionsMessage ?? 'No results match your search.',
                focusedOptionIndex: null,
                name: config.name,
                open: false,
                options: {},
                placeholder: config.placeholder ?? null,
                search: '',
                value: config.value,
                oldValue: config.old ?? null,
                closeListbox: function() {
                    this.open = false
                    this.focusedOptionIndex = null
                    this.search = ''
                },
                focusNextOption: function() {
                    if (this.focusedOptionIndex === null) return this.focusedOptionIndex = Object.keys(this.options)
                        .length - 1
                    if (this.focusedOptionIndex + 1 >= Object.keys(this.options).length) return
                    this.focusedOptionIndex++
                    this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
                        block: "center",
                    })
                },
                focusPreviousOption: function() {
                    if (this.focusedOptionIndex === null) return this.focusedOptionIndex = 0
                    if (this.focusedOptionIndex <= 0) return
                    this.focusedOptionIndex--
                    this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
                        block: "center",
                    })
                },
                init: async function() {
                    if (this.url) {
                        let response = await axios.get(this.url);
                        this.data = response.data.data;
                        this.options = response.data.data;
                    } else {
                        this.options = this.data;
                    }

                    if (!(this.value in this.options)) this.value = null
                    this.$watch('search', ((value) => {
                        if (!this.open || !value) return this.options = this.data
                        this.options = this.data.filter((key) => key.name.toLowerCase().includes(value
                            .toLowerCase()));
                    }))
                },
                selectOption: function() {
                    if (!this.open) return this.toggleListboxVisibility()
                    this.value = Object.keys(this.options)[this.focusedOptionIndex]
                    @this.set(this.wireModel, this.options[this.focusedOptionIndex].id);
                    this.closeListbox()
                },
                toggleListboxVisibility: function() {

                    if (this.open) return this.closeListbox()
                    this.focusedOptionIndex = Object.keys(this.options).indexOf(this.value)
                    if (this.focusedOptionIndex < 0) this.focusedOptionIndex = 0
                    this.open = true
                    this.$nextTick(() => {
                        this.$refs.search.focus()
                        this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
                            block: "nearest"
                        })
                    })
                },
            }
        }

    </script>
@endpush