<x-layout>
    <div class="p-10 pl-20 pr-20">
        <x-alert-info>You may now start editing.</x-alert-info>
        <div class="bg-base-100 shadow-2xl p-3 rounded-box">
            <form action="{{ route('deposits.update', [$deposit->id]) }}" method="POST">

                @csrf
                @method('PUT')
                <div class="stats flex">
                    <div class="stat flex-1">
                        <div class="stat-title">Deposit number</div>
                        <div class="stat-value text-sm text-secondary">
                            {{ str_pad($deposit->id, 5, '0', STR_PAD_LEFT) }}
                        </div>
                    </div>
                    <div class="stat flex-1 text-right">
                        <div class="stat-title">Date</div>
                        <input type="datetime-local" class="stat-value text-sm outline-none text-secondary text-right"
                            name="created_at" value="{{ $deposit->created_at }}" />
                    </div>
                </div>
                <div class="divider divider-secondary mt-0.5"></div>
                <div class="stats stats-vertical w-full">
                    <div class="stat">
                        <div class="stat-figure text-secondary">
                            <x-user></x-user>
                        </div>
                        <div class="stat-title">Received from</div>
                        <input type="text" class="stat-value outline-none text-primary" placeholder="ex. John Smith"
                            name="received_from" value="{{ $deposit->received_from }}" />
                        <div class="stat-desc">Depositor</div>
                    </div>
                    <div class="stat">
                        <div class="stat-figure text-success">
                            <x-cash></x-cash>
                        </div>
                        <div class="stat-title">Amount</div>
                        <div class="stat-value text-success">
                            <x-peso></x-peso>
                            <input type="number" class="stat-value outline-none" placeholder="00.00" name="amount"
                                step="0.01" value="{{ $deposit->amount }}" />
                        </div>
                        <div class="stat-desc">In pesos</div>
                    </div>
                    <div class="stat">
                        <div class="stat-title">Remarks</div>
                        <textarea name="remarks" class=" font-normal outline-none stat-value text-lg"
                            placeholder="Say something about this deposit">{{ $deposit->remarks }}</textarea>
                    </div>
                </div>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <x-alert-error>{{ $error }}</x-alert-error>
                    @endforeach
                @endif

                <div class="divider"></div>
                <div class="pb-10 flex">
                    <div class="flex-1">
                    </div>
                    <button class="btn btn-wide btn-primary">Save</button>
                </div>

            </form>
        </div>

    </div>

</x-layout>
