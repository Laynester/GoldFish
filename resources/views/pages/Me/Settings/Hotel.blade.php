@extends('layouts.base')
@section('content')
@section('title', 'Settings')
<div class="container">
  <div class="row">
    <div class="col-lg-4">
      <div class="box black">
        <div class="heading">Settings</div>
      </div>
    </div>
    <div class="col-lg-8">
      <div class="box black">
        <div class="heading">Hotel Settings</div>
          <form method="post">
            <label>Me page Hotel View</label>
            <select name="hotelview">
              <option value="{{Auth()->User()->hotelview}}">Hotel View</option>
              <option disabled></option>
              <option value="view_fi_wide.gif">Finland</option>
              <option value="view_uk_wide.gif">United Kingdom</option>
              <option value="view_ch_wide.gif">Switzerland</option>
              <option value="view_jp_wide.png">Japan</option>
              <option value="view_es_wide.gif">Spain</option>
              <option value="view_it_wide.png">Italy</option>
              <option value="view_se_wide.png">Sweden</option>
              <option value="view_nl_wide.png">Netherlands</option>
              <option value="view_de_wide.png">Germany</option>
              <option value="view_ca_wide.png">Canada</option>
              <option value="view_no_wide.gif">Norway</option>
              <option value="view_us_wide.png">United States</option>
              <option value="view_fr_wide.png">France</option>
              <option value="view_au_wide.png">Australia</option>
              <option value="view_sg_wide.png">Singapore</option>
              <option value="view_dk_wide.png">Denmark</option>
              <option value="view_br_wide.png">Brazil</option>
              <option value="view_ru_wide.png">Russia</option>
              <option value="view_beta_wide.png">Beta</option>
            </select>
            <button type="submit" name="submit">Save Settings</button>
            @csrf
          </form>
      </div>
    </div>
  </div>
</div>
@endsection
