<x-guest-layout>
    <form method="POST" action="{{ route('schedule.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <!-- Description -->
        <div>
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" class="block mt-1 w-full" type="text" name="description"   autofocus autocomplete="description">{{ old('description') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

          <!-- Start_date -->
          <div>
            <x-input-label for="start_date" :value="__('Start_date')" />
            <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date')" required autofocus autocomplete="start_date" />
            <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
        </div>

          <!-- End_date -->
          <div>
            <x-input-label for="end_date" :value="__('End_date')" />
            <x-text-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" :value="old('end_date')" required autofocus autocomplete="end_date" />
            <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                登録
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
