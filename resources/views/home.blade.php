@extends('layouts.admin')

@section('content')
    <div class="page-content">
        @if (Auth()->user()->is_admin)
            <div class="serach">
                <input type="text" class="form-control" name=""
                    placeholder="Search calls, profiles, workspaces and reports">
                <img src="/dash-assets/images/search.png">
                <button class="btn fill-btn">Search</button>
            </div>
            <div class="application-previw">
                <h1>application overview</h1>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3 ">
                        <div class="card">
                            <h2>450</h2>
                            <p>Job Applied</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 ">
                        <div class="card">
                            <h2>1500</h2>
                            <p> online test complted</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 ">
                        <div class="card">
                            <h2>723</h2>
                            <p> Interview attened</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 ">
                        <div class="card">
                            <h2>850</h2>
                            <p>assement center attended </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 ">
                        <div class="card">
                            <h2>150</h2>
                            <p> Offer received</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 ">
                        <div class="card">
                            <h2>80%</h2>
                            <p> rate of passing intial stage</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 ">
                        <div class="card">
                            <h2>50%</h2>
                            <p> test pass rate</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 ">
                        <div class="card">
                            <h2>30%</h2>
                            <p> test pass rate</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 ">
                        <div class="card">
                            <h2>45%</h2>
                            <p> assessment center pass rate</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 ">
                        <div class="card">
                            <h2>29%</h2>
                            <p> all application success rate</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="application-progress">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Job application progress</h1>
                    <button class="btn fill-btn">Add More <i class="bu bi-plus "></i></button>
                </div>
                <div class="card">
                    <div class="media">
                        <img src="/dash-assets/images/Rectangle 1449.png" class="mr-3" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0">Senior Full-Stack Software Engineer - React / Node.js</h5>
                            <p>Envision Technologies Inc.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-success ">
                                <label>application submitted</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label>online test</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Select</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-warning">
                                <label>Interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-danger">
                                <label>2nd round interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Failed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label>final round interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label> offer</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="media">
                        <img src="/dash-assets/images/Rectangle 1449.png" class="mr-3" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0">Senior Full-Stack Software Engineer - React / Node.js</h5>
                            <p>Envision Technologies Inc.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-success ">
                                <label>application submitted</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label>online test</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Select</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-warning">
                                <label>Interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-danger">
                                <label>2nd round interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Failed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label>final round interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label> offer</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="media">
                        <img src="/dash-assets/images/Rectangle 1449.png" class="mr-3" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0">Senior Full-Stack Software Engineer - React / Node.js</h5>
                            <p>Envision Technologies Inc.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-success ">
                                <label>application submitted</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label>online test</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Select</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-warning">
                                <label>Interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-danger">
                                <label>2nd round interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Failed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label>final round interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label> offer</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="media">
                        <img src="/dash-assets/images/Rectangle 1449.png" class="mr-3" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0">Senior Full-Stack Software Engineer - React / Node.js</h5>
                            <p>Envision Technologies Inc.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-success ">
                                <label>application submitted</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label>online test</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Select</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-warning">
                                <label>Interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-danger">
                                <label>2nd round interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Failed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label>final round interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label> offer</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="media">
                        <img src="/dash-assets/images/Rectangle 1449.png" class="mr-3" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0">Senior Full-Stack Software Engineer - React / Node.js</h5>
                            <p>Envision Technologies Inc.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-success ">
                                <label>application submitted</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label>online test</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Select</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-warning">
                                <label>Interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-danger">
                                <label>2nd round interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Failed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label>final round interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label> offer</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="media">
                        <img src="/dash-assets/images/Rectangle 1449.png" class="mr-3" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0">Senior Full-Stack Software Engineer - React / Node.js</h5>
                            <p>Envision Technologies Inc.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-success ">
                                <label>application submitted</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label>online test</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Select</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-warning">
                                <label>Interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-danger">
                                <label>2nd round interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Failed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label>final round interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label> offer</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="media">
                        <img src="/dash-assets/images/Rectangle 1449.png" class="mr-3" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0">Senior Full-Stack Software Engineer - React / Node.js</h5>
                            <p>Envision Technologies Inc.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-success ">
                                <label>application submitted</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label>online test</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Select</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-warning">
                                <label>Interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group select-danger">
                                <label>2nd round interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Failed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label>final round interview</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                            <div class="form-group ">
                                <label> offer</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Completed</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <h2>User Dashboard</h2>
        @endif
    </div>
@endsection
