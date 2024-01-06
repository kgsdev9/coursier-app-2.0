<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card mb-4">
                <!-- Card header -->
                <div class="card-header border-bottom-0">
                    <h3 class="h4 mb-3">Withdraw History</h3>
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-6 pe-md-0 mb-2 mb-lg-0">
                            <!-- Custom select -->
                            <select class="form-select">
                                <option value="">30 days</option>
                                <option value="Last 7 days">2 Months</option>
                                <option value="High Rated">6 Months</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 pe-md-0 mb-2 mb-lg-0">
                            <!-- Custom select -->
                            <select class="form-select">
                                <option value="">Oct 2020</option>
                                <option value="Jan 2021">Jan 2021</option>
                                <option value="May 2021">May 2021</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-2 mb-lg-0">
                            <!-- Custom select -->
                            <select class="form-select">
                                <option value="">Transaction Type</option>
                                <option value="cash transactions">Cash Transactions</option>
                                <option value="non-cash transactions">Non Cash Transactions</option>
                                <option value="credit transactions">Credit Transactions</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-6 text-lg-end">
                            <!-- Button -->
                            <a href="#" class="btn btn-outline-secondary btn-icon" download="">
                                <i class="fe fe-download"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Table -->
                <div class="table-responsive">
                    <table class="table mb-0 text-nowrap table-hover table-centered table-with-checkbox">
                        <thead class="table-light">
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkAll">
                                        <label class="form-check-label" for="checkAll"></label>
                                    </div>
                                </th>
                                <th>ID</th>
                                <th>Method</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="withdrawTwo">
                                        <label class="form-check-label" for="withdrawTwo"></label>
                                    </div>
                                </td>
                                <td>#1060</td>
                                <td>PayPal</td>
                                <td>
                                    <span class="badge bg-warning">Pending</span>
                                </td>
                                <td>$1200</td>
                                <td>Sept 15, 2020</td>
                                <td>
                                    <span class="dropdown dropstart">
                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="paymentDropdown" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <span class="dropdown-menu" aria-labelledby="paymentDropdown">
                                            <span class="dropdown-header">Setting</span>
                                            <a class="dropdown-item" href="#">
                                                <i class="fe fe-edit dropdown-item-icon"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fe fe-trash dropdown-item-icon"></i>
                                                Remove
                                            </a>
                                        </span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="withdrawThree">
                                        <label class="form-check-label" for="withdrawThree"></label>
                                    </div>
                                </td>
                                <td>#1038</td>
                                <td>PayPal</td>
                                <td>
                                    <span class="badge bg-success">Paid</span>
                                </td>
                                <td>$2000</td>
                                <td>Aug 15, 2020</td>
                                <td>
                                    <span class="dropdown dropstart">
                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="paymentDropdown1" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <span class="dropdown-menu" aria-labelledby="paymentDropdown1">
                                            <span class="dropdown-header">Setting</span>
                                            <a class="dropdown-item" href="#">
                                                <i class="fe fe-edit dropdown-item-icon"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fe fe-trash dropdown-item-icon"></i>
                                                Remove
                                            </a>
                                        </span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="withdrawFour">
                                        <label class="form-check-label" for="withdrawFour"></label>
                                    </div>
                                </td>
                                <td>#1016</td>
                                <td>PayPal</td>
                                <td>
                                    <span class="badge bg-success">Paid</span>
                                </td>
                                <td>$3590</td>
                                <td>July 15, 2020</td>
                                <td>
                                    <span class="dropdown dropstart">
                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="paymentDropdown2" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <span class="dropdown-menu" aria-labelledby="paymentDropdown2">
                                            <span class="dropdown-header">Setting</span>
                                            <a class="dropdown-item" href="#">
                                                <i class="fe fe-edit dropdown-item-icon"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fe fe-trash dropdown-item-icon"></i>
                                                Remove
                                            </a>
                                        </span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="withdrawFive">
                                        <label class="form-check-label" for="withdrawFive"></label>
                                    </div>
                                </td>
                                <td>#1008</td>
                                <td>PayPal</td>
                                <td>
                                    <span class="badge bg-success">Paid</span>
                                </td>
                                <td>$4500</td>
                                <td>Aug 15, 2020</td>
                                <td>
                                    <span class="dropdown dropstart">
                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="paymentDropdown3" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <span class="dropdown-menu" aria-labelledby="paymentDropdown3">
                                            <span class="dropdown-header">Setting</span>
                                            <a class="dropdown-item" href="#">
                                                <i class="fe fe-edit dropdown-item-icon"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fe fe-trash dropdown-item-icon"></i>
                                                Remove
                                            </a>
                                        </span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="withdrawSix">
                                        <label class="form-check-label" for="withdrawSix"></label>
                                    </div>
                                </td>
                                <td>#1002</td>
                                <td>PayPal</td>
                                <td>
                                    <span class="badge bg-success">Paid</span>
                                </td>
                                <td>$4500</td>
                                <td>May 15, 2020</td>
                                <td>
                                    <span class="dropdown dropstart">
                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="paymentDropdown4" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <span class="dropdown-menu" aria-labelledby="paymentDropdown4">
                                            <span class="dropdown-header">Setting</span>
                                            <a class="dropdown-item" href="#">
                                                <i class="fe fe-edit dropdown-item-icon"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fe fe-trash dropdown-item-icon"></i>
                                                Remove
                                            </a>
                                        </span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="withdrawSeven">
                                        <label class="form-check-label" for="withdrawSeven"></label>
                                    </div>
                                </td>
                                <td>#982</td>
                                <td>PayPal</td>
                                <td>
                                    <span class="badge bg-success">Paid</span>
                                </td>
                                <td>$1232</td>
                                <td>April 15, 2020</td>
                                <td>
                                    <span class="dropdown dropstart">
                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="paymentDropdown5" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <span class="dropdown-menu" aria-labelledby="paymentDropdown5">
                                            <span class="dropdown-header">Setting</span>
                                            <a class="dropdown-item" href="#">
                                                <i class="fe fe-edit dropdown-item-icon"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fe fe-trash dropdown-item-icon"></i>
                                                Remove
                                            </a>
                                        </span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="withdrawEight">
                                        <label class="form-check-label" for="withdrawEight"></label>
                                    </div>
                                </td>
                                <td>#970</td>
                                <td>PayPal</td>
                                <td>
                                    <span class="badge bg-danger">Cancel</span>
                                </td>
                                <td>$4235</td>
                                <td>March 15, 2020</td>
                                <td>
                                    <span class="dropdown dropstart">
                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="paymentDropdown6" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <span class="dropdown-menu" aria-labelledby="paymentDropdown6">
                                            <span class="dropdown-header">Setting</span>
                                            <a class="dropdown-item" href="#">
                                                <i class="fe fe-edit dropdown-item-icon"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fe fe-trash dropdown-item-icon"></i>
                                                Remove
                                            </a>
                                        </span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="withdrawNine">
                                        <label class="form-check-label" for="withdrawNine"></label>
                                    </div>
                                </td>
                                <td>#965</td>
                                <td>PayPal</td>
                                <td>
                                    <span class="badge bg-success">Paid</span>
                                </td>
                                <td>$1231</td>
                                <td>Feb 15, 2020</td>
                                <td>
                                    <span class="dropdown dropstart">
                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="paymentDropdown7" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <span class="dropdown-menu" aria-labelledby="paymentDropdown7">
                                            <span class="dropdown-header">Setting</span>
                                            <a class="dropdown-item" href="#">
                                                <i class="fe fe-edit dropdown-item-icon"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fe fe-trash dropdown-item-icon"></i>
                                                Remove
                                            </a>
                                        </span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="withdrawTen">
                                        <label class="form-check-label" for="withdrawTen"></label>
                                    </div>
                                </td>
                                <td>#953</td>
                                <td>PayPal</td>
                                <td>
                                    <span class="badge bg-success">Paid</span>
                                </td>
                                <td>$5435</td>
                                <td>Jan 15, 2020</td>
                                <td>
                                    <span class="dropdown dropstart">
                                        <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="paymentDropdown8" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <span class="dropdown-menu" aria-labelledby="paymentDropdown8">
                                            <span class="dropdown-header">Setting</span>
                                            <a class="dropdown-item" href="#">
                                                <i class="fe fe-edit dropdown-item-icon"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fe fe-trash dropdown-item-icon"></i>
                                                Remove
                                            </a>
                                        </span>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="card-footer">
                        <nav>
                            <ul class="pagination justify-content-center mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link mx-1 rounded" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z">
                                        </path></svg>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link mx-1 rounded" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link mx-1 rounded" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link mx-1 rounded" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link mx-1 rounded" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
