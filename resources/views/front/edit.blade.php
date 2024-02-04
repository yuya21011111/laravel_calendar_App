<x-app-layout>
    <section class="mt-8">
    <form method="POST" action="{{ route('schedule.update', ['id' => $schedule->id])}}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="title" :value="__('タイトル')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $schedule->title }}" required autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <!-- Description -->
        <div>
            <x-input-label for="description" :value="__('概要')" />
            <textarea id="description" class="block mt-1 w-full" type="text" name="description"   autofocus autocomplete="description">{{ $schedule->description }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

          <!-- Start_date -->
        <div>
            <x-input-label for="start_date" :value="__('開始日')" />
            <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" value="{{ $schedule->start_date }}" required autofocus autocomplete="start_date" />
            <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
        </div>

          <!-- Start_time -->
          <div>
            <x-input-label for="start_time" :value="__('開始時間')" />
            <x-text-input id="start_time" class="block mt-1 w-full" type="time" name="start_time" value="{{ $schedule->start_time }}" required autofocus autocomplete="start_time" />
            <x-input-error :messages="$errors->get('start_time')" class="mt-2" />
        </div>


          <!-- End_date -->
          <div>
            <x-input-label for="end_date" :value="__('終了日')" />
            <x-text-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" value="{{ $schedule->end_date }}"  required autofocus autocomplete="end_date" />
            <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
        </div>

         <!-- End_time -->
         <div>
            <x-input-label for="end_time" :value="__('終了時間')" />
            <x-text-input id="end_time" class="block mt-1 w-full" type="time" name="end_time" value="{{ $schedule->end_time }}" required autofocus autocomplete="end_time" />
            <x-input-error :messages="$errors->get('end_time')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                登録
            </x-primary-button>
        </div>
    </form>
    </section>
</x-app-layout>