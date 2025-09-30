<x-layout>
    <div class="p-10">
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
                            <th class="text text-primary">{{ str_pad($deposit->id, 5, "0", STR_PAD_LEFT) }}</th>
                            <td>
                                {{ $deposit->received_from }}
                            </td>
                            <td class="text text-right text-success font-bold"><x-peso></x-peso>
                                {{ number_format($deposit->amount, 2, '.', ',') }}</td>
                            <td class="opacity-50">{{ date('d F Y', strtotime($deposit->created_at)) }}</td>
                            <td>
                                <a href="{{ route('deposits.show', [$deposit->id]) }}" class="link link-info">
                                    View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-10">
            {{ $deposits->links() }}
        </div>

    </div>

</x-layout>
