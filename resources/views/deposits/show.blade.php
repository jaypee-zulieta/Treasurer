<x-layout>
    <div class="p-10 pl-20 pr-20">
        <div class="bg-base-100 shadow-2xl p-3 rounded-box">
            <form action="{{ route('deposits.store') }}" method="POST">
                @csrf
                <div class="stats flex">
                    <div class="stat flex-1">
                        <div class="stat-title">Deposit number</div>
                        <div class="stat-value text-sm text-secondary">
                            {{ str_pad($deposit->id, 5, '0', STR_PAD_LEFT) }}
                        </div>
                    </div>
                    <div class="stat flex-1">
                        <div class="stat-title text-right">Date</div>
                        <div class="stat-value text-sm text-secondary text-right">
                            {{ $deposit->created_at }}
                        </div>
                    </div>
                </div>
                <div class="divider divider-secondary mt-0.5"></div>
                <div class="stats stats-vertical w-full">
                    <div class="stat">
                        <div class="stat-figure text-secondary">
                            <x-user></x-user>
                        </div>
                        <div class="stat-title">Received from</div>
                        <div class="stat-value text-primary">{{ $deposit->received_from }}</div>
                        <div class="stat-desc">Depositor</div>
                    </div>
                    <div class="stat">
                        <div class="stat-figure text-success">
                            <x-cash></x-cash>
                        </div>
                        <div class="stat-title">Amount</div>
                        <div class="stat-value text-success">
                            <x-peso></x-peso>
                            {{ number_format($deposit->amount, 2, '.', ',') }}
                        </div>
                        <div class="stat-desc">In pesos</div>
                    </div>
                    @if ($deposit->remarks)
                        <div class="stat">
                            <div class="stat-title">Remarks</div>
                            <div class=" font-normal stat-value text-lg text-wrap italic opacity-75">
                                {{ $deposit->remarks }}</div>
                        </div>
                    @endif

                </div>

                <div class="divider"></div>
                <div class="pb-10 flex">
                    <div class="flex-2"></div>
                    <form action="flex-1">
                        <div class="join">
                            <a href="{{ route('deposits.edit', [$deposit->id]) }}"
                                class="btn btn-info btn-soft join-item btn-sm">
                                <x-pencil-icon></x-pencil-icon>
                                Edit
                            </a>
                            <button class="btn btn-soft btn-error join-item btn-sm">
                                <x-trash-icon></x-trash-icon>
                                Delete
                            </button>
                        </div>

                    </form>

                </div>

            </form>
        </div>

    </div>

</x-layout>
