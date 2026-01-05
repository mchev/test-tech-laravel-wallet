<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recurring transfers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <h2 class="text-xl font-bold mb-6">@lang('Set a new recurring transfer')</h2>
                <form method="POST" action="{{ route('recurring.store') }}" class="space-y-4">
                    @csrf

                    @if (session('money-sent-status') === 'success')
                        <div class="p-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                            <span class="font-medium">@lang('Money sent!')</span>
                            @lang(':amount were successfully sent to :name.', ['amount' => Number::currencyCents(session('money-sent-amount', 0)), 'name' => session('money-sent-recipient-name')])
                        </div>
                    @elseif (session('money-sent-status') === 'insufficient-balance')
                            <div class="p-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <span class="font-medium">@lang('Insufficient balance!')</span>
                                @lang('You can\'t send :amount to :name.', ['amount' => Number::currencyCents(session('money-sent-amount', 0)), 'name' => session('money-sent-recipient-name')])
                            </div>
                    @endif

                    <div>
                        <x-input-label for="recipient_email" :value="__('Recipient email')" />
                        <x-text-input id="recipient_email"
                                      class="block mt-1 w-full"
                                      type="email"
                                      name="recipient_email"
                                      :value="old('recipient_email')"
                                      required />
                        <x-input-error :messages="$errors->get('recipient_email')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="amount" :value="__('Amount (€)')" />
                        <x-text-input id="amount"
                                      class="block mt-1 w-full"
                                      type="number"
                                      min="0"
                                      step="0.01"
                                      :value="old('amount')"
                                      name="amount"
                                      required />
                        <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="reason" :value="__('Reason')" />
                        <x-text-input id="reason"
                                      class="block mt-1 w-full"
                                      type="text"
                                      :value="old('reason')"
                                      name="reason"
                                      required />
                        <x-input-error :messages="$errors->get('reason')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="start_date" :value="__('Start date')" />
                        <x-text-input id="start_date"
                                      class="block mt-1 w-full"
                                      type="datetime-local"
                                      :value="old('start_date')"
                                      name="start_date"
                                      required />
                        <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="frequency" :value="__('Frequency (in days)')" />
                        <x-text-input id="frequency"
                                      class="block mt-1 w-full"
                                      type="number"
                                      step="1"
                                      :value="old('frequency')"
                                      name="frequency"
                                      required />
                        <x-input-error :messages="$errors->get('frequency')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="end_date" :value="__('End date')" />
                        <x-text-input id="end_date"
                                      class="block mt-1 w-full"
                                      type="datetime-local"
                                      :value="old('end_date')"
                                      name="end_date"
                                      required />
                        <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                    </div>
                    <div class="flex justify-end mt-4">
                        <x-primary-button>
                            {{ __('Send my money !') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <h2 class="text-xl font-bold mb-6">@lang('Transactions history')</h2>

            </div>
        </div>
    </div>
</x-app-layout>
