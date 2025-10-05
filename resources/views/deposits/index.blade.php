<x-layout>


    <div class="p-10">
        @if (session('deposit-new'))
            <x-alert-success>
                Deposit {{ str_pad(session('deposit-new'), 5, '0', STR_PAD_LEFT) }} successfully made!
            </x-alert-success>
        @elseif(session('deposit-deleted'))
            <x-alert-success>
                Deposit {{ str_pad(session('deposit-deleted'), 5, '0', STR_PAD_LEFT) }} successfully deleted!
            </x-alert-success>
        @elseif(session('deposit-updated'))
            <x-alert-success>
                Deposit {{ str_pad(session('deposit-updated'), 5, '0', STR_PAD_LEFT) }} successfully updated!
            </x-alert-success>
        @endif

        <div class="mb-10 flex">
            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-figure text-success">
                        <x-cash></x-cash>
                    </div>
                    <div class="stat-title">Total amount deposited</div>
                    <div class="stat-value text-success">
                        <x-peso></x-peso> {{ $total }}
                    </div>
                    <div class="stat-actions mt-2">
                        <a href="{{ route('deposits.create') }}" class="btn btn-xs btn-success btn-block btn-soft">
                            Make a deposit
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex-1"></div>
            <div class="flex-1 flex flex-col">
                <div class="flex-1"></div>
                <form class="" action="{{ route('deposits.index') }}" method="GET">
                    <div class="join w-full">
                        <label class="input w-full join-item">
                            <x-search-icon></x-search-icon>
                            <input type="text" name="search" value="{{ old('search', $search ?? '') }}"
                                placeholder="Search">
                        </label>
                        <button class="join-item btn btn-secondary">Search</button>
                    </div>

                </form>
            </div>

        </div>
        <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100 shadow-2xl">
            <table class="table">
                <thead class="bg-primary text-primary-content">
                    <tr>
                        <th class="min-w-12">Deposit number</th>
                        <th>Received From</th>
                        <th class="text text-right">Amount</th>
                        <th class="w-56">Date</th>
                        <th class="w-32"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deposits as $deposit)
                        <tr class="hover:bg-base-300">
                            <th class="text text-primary">

                                {{ str_pad($deposit->id, 5, '0', STR_PAD_LEFT) }}

                                @if ($deposit->id == session('deposit-new'))
                                    <div class="badge badge-soft badge-info">New</div>
                                @endif
                            </th>
                            <td>
                                {{ $deposit->received_from }}
                            </td>
                            <td class="text text-right text-success font-bold"><x-peso></x-peso>
                                {{ number_format($deposit->amount, 2, '.', ',') }}</td>
                            <td class="opacity-50">{{ date('d F Y', strtotime($deposit->created_at)) }}</td>
                            <td>
                                <a href="{{ route('deposits.show', [$deposit->id]) }}" class="link link-info">
                                    Details
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-10">
            {{ $deposits->withQueryString()->links() }}
        </div>

    </div>

</x-layout>
