@extends('layouts.app')

@section('content')
    <div class="row gy-4">

        <!-- Dashboard Widget Start -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card px-24 py-16 shadow-none radius-8 border h-100 bg-gradient-start-3">
                <div class="card-body p-0">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                        <div class="d-flex align-items-center">
                            <div
                                class="w-64-px h-64-px radius-16 bg-base-50 d-flex justify-content-center align-items-center me-20">
                                <span
                                    class="mb-0 w-40-px h-40-px bg-primary-600 flex-shrink-0 text-white d-flex justify-content-center align-items-center radius-8 h6">
                                    <iconify-icon icon="flowbite:users-group-solid" class="icon"></iconify-icon>
                                </span>
                            </div>
                            <div>
                                <span class="mb-2 fw-medium text-secondary-light text-md">New Users</span>
                                <h6 class="fw-semibold my-1">5000</h6>
                                <p class="text-sm mb-0">Increase by
                                    <span
                                        class="bg-success-focus px-1 rounded-2 fw-medium text-success-main text-sm">+200</span>
                                    this week
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard Widget End -->

        <!-- Dashboard Widget Start -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card px-24 py-16 shadow-none radius-8 border h-100 bg-gradient-start-2">
                <div class="card-body p-0">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                        <div class="d-flex align-items-center">

                            <div
                                class="w-64-px h-64-px radius-16 bg-base-50 d-flex justify-content-center align-items-center me-20">
                                <span
                                    class="mb-0 w-40-px h-40-px bg-purple flex-shrink-0 text-white d-flex justify-content-center align-items-center radius-8 h6">
                                    <iconify-icon icon="solar:wallet-bold" class="text-white text-2xl mb-0"></iconify-icon>
                                </span>
                            </div>

                            <div>
                                <span class="mb-2 fw-medium text-secondary-light text-md">Total Deposit</span>
                                <h6 class="fw-semibold my-1">15,000</h6>
                                <p class="text-sm mb-0">Increase by
                                    <span
                                        class="bg-danger-focus px-1 rounded-2 fw-medium text-danger-main text-sm">-200</span>
                                    this week
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard Widget End -->

        <!-- Dashboard Widget Start -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card px-24 py-16 shadow-none radius-8 border h-100 bg-gradient-start-5">
                <div class="card-body p-0">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                        <div class="d-flex align-items-center">

                            <div
                                class="w-64-px h-64-px radius-16 bg-base-50 d-flex justify-content-center align-items-center me-20">
                                <span
                                    class="mb-0 w-40-px h-40-px bg-red flex-shrink-0 text-white d-flex justify-content-center align-items-center radius-8 h6">
                                    <iconify-icon icon="fa6-solid:file-invoice-dollar"
                                        class="text-white text-2xl mb-0"></iconify-icon>
                                </span>
                            </div>

                            <div>
                                <span class="mb-2 fw-medium text-secondary-light text-md">Total Expense</span>
                                <h6 class="fw-semibold my-1">15,000</h6>
                                <p class="text-sm mb-0">Increase by
                                    <span
                                        class="bg-success-focus px-1 rounded-2 fw-medium text-success-main text-sm">+200</span>
                                    this week
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard Widget End -->

        <!-- Dashboard Widget Start -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card px-24 py-16 shadow-none radius-8 border h-100 bg-gradient-start-4">
                <div class="card-body p-0">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                        <div class="d-flex align-items-center">

                            <div
                                class="w-64-px h-64-px radius-16 bg-base-50 d-flex justify-content-center align-items-center me-20">
                                <span
                                    class="mb-0 w-40-px h-40-px bg-success-main flex-shrink-0 text-white d-flex justify-content-center align-items-center radius-8 h6">
                                    <iconify-icon icon="streamline:bag-dollar-solid" class="icon"></iconify-icon>
                                </span>
                            </div>

                            <div>
                                <span class="mb-2 fw-medium text-secondary-light text-md">Total Earning</span>
                                <h6 class="fw-semibold my-1">15,000</h6>
                                <p class="text-sm mb-0">Increase by
                                    <span
                                        class="bg-success-focus px-1 rounded-2 fw-medium text-success-main text-sm">+200</span>
                                    this week
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard Widget End -->



        <!-- Latest Investments Start -->
        <div class="col-xxl">
            <div class="card h-100">
                <div class="card-body p-24">
                    <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between mb-20">
                        <h6 class="mb-2 fw-bold text-lg">Dashboard Siswa</h6>

                    </div>
                    <div class="table-responsive scroll-sm">
                        <table class="table bordered-table sm-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Asset</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price </th>
                                    <th scope="col">Date</th>
                                    <th scope="col" class="text-center">Total Orders</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/images/asset/asset-img1.png') }}" alt=""
                                                class="flex-shrink-0 me-12 w-40-px h-40-px radius-8">
                                            <div class="flex-grow-1">
                                                <h6 class="text-md mb-0 fw-normal">Gold</h6>
                                                <span class="text-sm text-secondary-light fw-normal">Main Asset</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="text-md mb-0 fw-normal">7500</h6>
                                        <span class="text-sm text-secondary-light fw-normal">Ounces</span>
                                    </td>
                                    <td>$7,500.00</td>
                                    <td>25 May 2024</td>
                                    <td class="text-center">
                                        <span
                                            class="bg-success-focus text-success-main px-16 py-4 radius-8 fw-medium text-sm">Completed</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/images/asset/asset-img2.png') }}" alt=""
                                                class="flex-shrink-0 me-12 w-40-px h-40-px radius-8">
                                            <div class="flex-grow-1">
                                                <h6 class="text-md mb-0 fw-normal">Dollars</h6>
                                                <span class="text-sm text-secondary-light fw-normal">Currency</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="text-md mb-0 fw-normal">5,40,000</h6>
                                        <span class="text-sm text-secondary-light fw-normal">Dollars</span>
                                    </td>
                                    <td>$5,40,000.00</td>
                                    <td>25 May 2024</td>
                                    <td class="text-center">
                                        <span
                                            class="bg-warning-focus text-warning-main px-16 py-4 radius-8 fw-medium text-sm">In
                                            Progress</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/images/asset/asset-img3.png') }}" alt=""
                                                class="flex-shrink-0 me-12 w-40-px h-40-px radius-8">
                                            <div class="flex-grow-1">
                                                <h6 class="text-md mb-0 fw-normal">Stock Market</h6>
                                                <span class="text-sm text-secondary-light fw-normal">Product</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="text-md mb-0 fw-normal">1500</h6>
                                        <span class="text-sm text-secondary-light fw-normal">Products</span>
                                    </td>
                                    <td>$50,000.00</td>
                                    <td>25 May 2024</td>
                                    <td class="text-center">
                                        <span
                                            class="bg-success-focus text-success-main px-16 py-4 radius-8 fw-medium text-sm">Completed</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/images/asset/asset-img4.png') }}" alt=""
                                                class="flex-shrink-0 me-12 w-40-px h-40-px radius-8">
                                            <div class="flex-grow-1">
                                                <h6 class="text-md mb-0 fw-normal">Dimond</h6>
                                                <span class="text-sm text-secondary-light fw-normal">Asset</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="text-md mb-0 fw-normal">350</h6>
                                        <span class="text-sm text-secondary-light fw-normal">Ounces</span>
                                    </td>
                                    <td>$30,000.00</td>
                                    <td>25 May 2024</td>
                                    <td class="text-center">
                                        <span
                                            class="bg-warning-focus text-warning-main px-16 py-4 radius-8 fw-medium text-sm">In
                                            Progress</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/images/asset/asset-img5.png') }}" alt=""
                                                class="flex-shrink-0 me-12 w-40-px h-40-px radius-8">
                                            <div class="flex-grow-1">
                                                <h6 class="text-md mb-0 fw-normal">S&P 500</h6>
                                                <span class="text-sm text-secondary-light fw-normal">Index</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="text-md mb-0 fw-normal">24,000</h6>
                                        <span class="text-sm text-secondary-light fw-normal">Shares</span>
                                    </td>
                                    <td>$63,000.00</td>
                                    <td>25 May 2024</td>
                                    <td class="text-center">
                                        <span
                                            class="bg-success-focus text-success-main px-16 py-4 radius-8 fw-medium text-sm">Completed</span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Latest Investments End -->


    </div>
@endsection
