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
                            <x-input-number id="student_number" value="20211024" autofocus></x-input-number>
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
                                <x-input-number name="amount"></x-input-number>
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
                // Check if the Enter key (key code 13) was pressed
                const student_number = this.value;
                if (event.key === "Enter") {
                    fetch("{{ route('payments.fee-lists') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({ student_number: student_number })
                    }).then(function(response){
                        return response.json();
                    }).then(function(fees) {
                        const student_fee_container = document.getElementById("student_fee_container");
                        student_fee_container.hidden = false;
                        const fee_container = document.getElementById("fee_container");
                        fee_container.innerHTML = '';




                        let tableRows = fees.map(function(element) {
                            return `
                                <x-tr>
                                    <x-td><x-btn onclick="openModal(${element.id}, ${student_number}, ${element.amount})" >pay</x-btn></x-td>
                                    <x-td>${element.name}</x-td>
                                    <x-td>${element.amount}</x-td>
                                    <x-td>${element.school_year.name}</x-td>
                                </x-tr>
                            `;
                        }).join('');

                        fee_container.innerHTML += `
                            <x-table id="table">
                                <x-thead>
                                    <x-tr>
                                        <x-th>Action</x-th>
                                        <x-th>Name</x-th>
                                        <x-th>Amount</x-th>
                                        <x-th>School Year</x-th>
                                    </x-tr>
                                </x-thead>
                                <x-tbody>
                                    ${tableRows} <!-- Insert the rows here -->
                                </x-tbody>
                            </x-table>
                        `;

                    });
                }
            });
        });

        $("#table").DataTable();
    </script>

@endsection



@endsection



