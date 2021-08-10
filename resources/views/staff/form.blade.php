<div class="row">
    <div class="form-group col-lg-6">
        <label >{{ 'Name' }}</label>
        <input class="form-control form-control-sm" name="Name" type="text" value="{{ isset($staff->date) ? $staff-> Name: ''}}" >     
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'Age' }}</label>
        <input class="form-control form-control-sm" name="Age" type="number" value="{{ isset($staff->country) ? $staff-> Age: ''}}" > 
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'Salary' }}</label>
        <input class="form-control form-control-sm" name="Salary" type="number" value="{{ isset($staff->total) ? $staff->Salary : ''}}" >    
    </div>
    <div class="form-group col-lg-6 ">
        <label>{{ 'Phone' }}</label>
        <input class="form-control form-control-sm" name="Phone" type="number" value="{{ isset($staff->active) ? $staff->Phone : ''}}" >    
    </div>
   

</div>
