<x-layout>
    <div class="p-10 pl-20 pr-20">

        <div class="bg-base-100 shadow-2xl p-3 rounded-box">

            <form action="{{ route('deposits.store') }}" method="POST">
                @csrf
                <div class="stats">
                    <div class="stat">
                        <div class="stat-title">Date</div>
                        <input type="datetime-local" class="stat-value text-sm outline-none text-secondary"
                            name="created_at" value="{{ now() }}" />
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
                            name="received_from" />
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
                                step="0.01" />
                        </div>
                        <div class="stat-desc">In pesos</div>
                    </div>
                    <div class="stat">
                        <div class="stat-title">Remarks</div>
                        <textarea name="remarks" class="font-light outline-none stat-value text-lg"
                            placeholder="Say something about this deposit"></textarea>
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
                    <button class="btn btn-wide btn-primary">Deposit</button>
                </div>

            </form>
        </div>

    </div>

</x-layout>
