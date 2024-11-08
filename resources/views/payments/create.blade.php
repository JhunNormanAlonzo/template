@extends('layouts.master')

<x-navbar></x-navbar>

@section('page_title')
    Payment
@endsection

<x-sidebar></x-sidebar>

@section('main')

    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            Student Number
                        </div>
                        <div class="card-body">
                            <br>
                            <x-input-number id="student_number" value="" autofocus></x-input-number>
                        </div>
                    </div>
                </div>
               <div class="col-8" id="student_fee_container" hidden>
                   <div class="card">
                       <div class="card-header">
                           Student Fees
                       </div>
                       <div class="card-body">
                           <div class="col-12" id="fee_container"></div>
                       </div>
                   </div>
               </div>

                <div class="col-12" id="student_payment_container" hidden>
                    <div class="card">
                        <div class="card-header">
                            Student Payment Logs
                        </div>
                        <div class="card-body">
                            <div class="col-12" id="payment_container"></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <form action="{{route('payments.store')}}" method="POST">
        @csrf
        @method("POST")
        <div class="modal fade" id="pay" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Payment Entry</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <x-label>Student Number</x-label>
                                <x-input-number readonly  name="student_number"></x-input-number>
                            </div>
                            <div class="col-12">
                                <x-label>Amount</x-label>
                                <x-input-number step="00.01" name="amount"></x-input-number>
                                <x-input-number hidden name="fee_id"></x-input-number>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Proceed</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


@section('script')
    <script>
        function openModal(fee_id, student_number, amount) {

            const studentNumberInput = document.querySelector('input[name="student_number"]');
            if (studentNumberInput) {
                studentNumberInput.value = student_number; // Set the student number
            }

            // Set the value of the "Amount" input
            const amountInput = document.querySelector('input[name="amount"]');
            if (amountInput) {
                // You can modify this logic to set the amount based on fee_id or other criteria
                amountInput.value = amount; // Example value, adjust as needed
            }

            const feeId = document.querySelector('input[name="fee_id"]');
            if (feeId) {
                // You can modify this logic to set the amount based on fee_id or other criteria
                feeId.value = fee_id; // Example value, adjust as needed
            }


            const modal = new bootstrap.Modal(document.getElementById("pay"), {});
            modal.show();


            console.log("Payment for ID:", fee_id);
            console.log("Payment for ID:", student_number);
        }

        $(document).ready(function () {

            $("#student_number").on("keyup", function (event) {
                const student_number = this.value;

                // Check if the Enter key was pressed
                if (event.key === "Enter") {
                    // Fetch the fee list for the given student number
                    fetch("{{ route('payments.fee-lists') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({ student_number: student_number })
                    })
                    .then(function(response) {return response.json();})
                    .then(function(fees) {
                        const student_fee_container = document.getElementById("student_fee_container");
                        student_fee_container.hidden = false;
                        const fee_container = document.getElementById("fee_container");
                        fee_container.innerHTML = '';

                        let tableRowsPromises = fees.map(function(element) {
                            return fetch("{{ route('payments.check-payment') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({
                                    student_number: student_number,
                                    fee_id: element.id
                                })
                            }).then(function(response) {
                                    return response.json();
                            }).then(function(data) {
                                    const isDisabled = data.balance <= 0;
                                    return `
                                        <x-tr>
                                            <x-td>
                                                <x-btn
                                                    onclick="openModal(${element.id}, '${student_number}', ${data.balance})"
                                                    class="${isDisabled ? 'disabled' : ''}"
                                                    >${isDisabled ? "Paid" : "Pay"}</x-btn>
                                            </x-td>
                                            <x-td>${element.name}</x-td>
                                            <x-td>${element.amount}</x-td>
                                            <x-td>${element.school_year.name}</x-td>
                                            <x-td>${data.balance}</x-td>
                                        </x-tr>
                                    `;
                            });
                        });

                        // Wait for all promises to resolve
                        Promise.all(tableRowsPromises).then(function(tableRows) {
                            // Populate the table with the generated rows
                            fee_container.innerHTML = `
                                <x-table id="table">
                                    <x-thead>
                                        <x-tr>
                                            <x-th>Action</x-th>
                                            <x-th>Name</x-th>
                                            <x-th>Amount</x-th>
                                            <x-th>School Year</x-th>
                                            <x-th>Balance</x-th>
                                        </x-tr>
                                    </x-thead>
                                    <x-tbody>
                                        ${tableRows.join('')} <!-- Insert the rows here -->
                                    </x-tbody>
                                </x-table>
                            `;
                        });
                    });


                    fetch("{{ route('payments.payment-logs') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({ student_number: student_number })
                    }).then(function(response) {
                        return response.json();
                    }).then(function (payment_logs){
                        const student_payment_container = document.getElementById("student_payment_container");
                        student_payment_container.hidden = false;
                        const payment_container = document.getElementById("payment_container");
                        payment_container.innerHTML = '';


                        const tableRowsPromises = payment_logs.map(function(log) {
                            return `
                                <x-tr>
                                    <x-td>${log.fee_name}</x-td>
                                    <x-td>${log.amount}</x-td>
                                    <x-td>${new Date(log.created_at).toLocaleDateString()}</x-td>
                                </x-tr>
                            `
                        });

                        const tableHTML = `
        <x-table id="payment-table">
            <x-thead>
                <x-tr>
                    <x-th>Fee</x-th>
                    <x-th>Amount</x-th>
                    <x-th>Date</x-th>
                </x-tr>
            </x-thead>
            <x-tbody>
                ${tableRowsPromises.join(' ')} <!-- Insert the rows here -->
            </x-tbody>
        </x-table>
    `;

                        // Insert the table into the payment container
                        payment_container.innerHTML = tableHTML;
                    });
                }
            });

        });

        $("#table").DataTable();
    </script>

@endsection



@endsection



