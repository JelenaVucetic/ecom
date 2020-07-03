<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 100% ;margin: 0 ;border-radius: 0 ;height: 100% ;">
      <div class="modal-content" style="border: 0;border-radius: 0;height: 130%;">
        <div class="modal-header" style="align-items: center;">
          <form  action="{{ route('search') }}" method="get">
              <input type="text"  name="query" value="{{ request()->input('query') }}" id="phone-search-input" placeholder="Search UrbanOne">
          </form>
          <button type="button" class="" data-dismiss="modal" style="background: none;border: none;">Cancel</button>
        </div>
        <div class="modal-body">
          <div>
            @php               
            $shirtsCat = DB::table('categories')
                    ->where('categories.name', '=', 'T-Shirts')
                    ->first();
          $casesCat = DB::table('categories')
                ->where('categories.name', '=', 'Cases')
                ->first();
            @endphp
              <div class="tshirt-cat">
                <a  href="{{route('category.show',[ $shirtsCat->id, $shirtsCat->name => $shirtsCat->parent_id ])}}">T-Shirts</a>
              </div>
              <div class='cases-cat'>
                  <a  href="{{route('category.show',[ $casesCat->id, $casesCat->name => $casesCat->parent_id ])}}">Cases</a>
              </div>
              <div class="gifts-cat">
                  <a href="/gifts_for_him">Gifts</a>
              </div>
          </div>
          <div>
              <p>Quik links</p>
              <a href="/help_center">
                  <div style="display: flex; align-items: flex-start;">
                      <img src="/site-images/46015-200.png" alt="" style='width: 22px;'>
                      <p style="color: #231F20;margin-left:5px">Help center</p>
                  </div>
              </a>
              <a href="/contact_us">
                <div style="display: flex; align-items: flex-start;">
                    <img src="/site-images/46015-200.png" alt="" style='width: 22px;'>
                    <p style="color: #231F20;margin-left:5px">Contact us</p>
                </div>
              </a>
              <a href="/privacy_policy">
                    <div style="display: flex; align-items: flex-start;">
                        <img src="/site-images/46015-200.png" alt="" style='width: 22px;'>
                        <p style="color: #231F20;margin-left:5px"> Privacy Policy</p>
                    </div>
              </a>
              <a href="/how_to_order">
                    <div style="display: flex; align-items: flex-start;">
                        <img src="/site-images/46015-200.png" alt="" style='width: 22px;'>
                        <p style="color: #231F20;margin-left:5px">How to order</p>
                    </div>
              </a>
          </div>
        </div>
      </div>
    </div>
  </div>