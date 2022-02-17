<div id="menu" class="my-4">
    <!-- Notification -->
    <div class="text-xl mb-10 flex flex-row justify-between border-b py-2">
        <div>
            Welcome <b>{{ Auth::user()->staff_username }}</b>
        </div>
        <div>
            Balance: <b>N{{ $balance }}</b>
        </div>
    </div>
    <!-- Message  -->
    <div class="py-1 mb-8 text-center">
        @include('layouts.messages')
    </div>
    <!-- Section  -->
    <div id="homeBar" class="">
        <div class="text-center text-2xl">
            {{ date('F', mktime(null, null, null, $month, 1)) }}, {{ $year }} Report
        </div>
        <div class="my-2">
            <table class="w-full">
                <tr class="text-left">
                    <th>No</th>
                    <th>Date</th>
                    @foreach($report_columns as $column)
                        <th class="">
                            {{ $column->account_name }}
                        </th>
                    @endforeach
                </tr>
                @foreach($reports as $report)
                    <tr class="text-left">
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ date('d/m/Y', strtotime($report->created_at)) }}</td>
                        @foreach($report_columns as $column)
                            <td>
                                @if($column->id == $report->account_id)
                                    {{ $report->record_amount }}
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <!-- Trademark  -->
    <div id="trademark" class="flex flex-row justify-between border-b my-12 text-center justify-content">
        <div>Imprest System</div>
        <div>A Product of Team Piccolo v 1.0</div>
    </div>
</div>