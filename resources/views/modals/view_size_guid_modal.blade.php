<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="display: block; border-bottom:none">
        <h5 class="modal-title" id="exampleModalLabel">Size Guide</h5>
        <div class="shirts-size-description">
            @if($pro_cat->category->name == "T-Shirts" || $pro_cat->category->name == "Polo Shirts" || $pro_cat->category->name == "Tank Tops" || $pro_cat->category->name == "Hoodies & Sweatshirts")
                <div>
                    <img src="/site-images/majice 500x500 muska.jpg" alt="">
                </div>
                <div>
                    <img src="/site-images/majice 500x500 zenska.jpg" alt="">
                </div>
            @else 
            @endif
        </div>
    
      </div>
      <div class="modal-body">
      @if($pro_cat->category->name == "T-Shirts" || $pro_cat->category->name == "Polo Shirts" || $pro_cat->category->name == "Tank Tops" || $pro_cat->category->name == "Hoodies & Sweatshirts")
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Size</th>
                <th scope="col">Chest <br> Man / Woman</th>
                <th scope="col">Length <br> Man / Woman</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>XS</td>
                    <td>51 / 40</td>
                    <td>68 / 60</td>
                </tr>
                <tr>
                    <td>S</td>
                    <td>53 / 42</td>
                    <td>70 / 62</td>
                </tr>
                <tr>
                    <td>M</td>
                    <td>56 / 44</td>
                    <td>72 / 64</td>
                </tr>
                <tr>
                    <td>L</td>
                    <td>58 / 46</td>
                    <td>74 / 66</td>
                </tr>
                <tr>
                    <td>XL</td>
                    <td>61/ 48</td>
                    <td>77 / 68</td>
                </tr>
                <tr>
                    <td>2XL</td>
                    <td>64 / 48</td>
                    <td>79 / 70</td>
                </tr>
            </tbody>
        </table>
        @elseif( $pro_cat->category->name == "Kids T-Shirts" )
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Size</th>
                <th scope="col">Chest </th>
                <th scope="col">Length </th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>2</td>
                    <td>29</td>
                    <td>38</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>32</td>
                    <td>43</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>35</td>
                    <td>47</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>38</td>
                    <td>52</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>41</td>
                    <td>56</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>44</td>
                    <td>61</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>47</td>
                    <td>65</td>
                </tr>
            </tbody>
        </table>
        @else
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Size</th>
                <th scope="col">Width</th>
                <th scope="col">Height</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>A3</td>
                    <td>94</td>
                    <td>54.5</td>
                </tr>
                <tr>
                    <td>B2</td>
                    <td>98.5</td>
                    <td>55.5</td>
                </tr>
                <tr>
                    <td>B1</td>
                    <td>103.5</td>
                    <td>57</td>
                </tr>
            </tbody>
        </table>
        @endif
      </div>
      <div class="modal-footer" id="size-guide-modal-footer">
        <p>Returns are free and easy.</p>
        <p>Because you need to be happy. We all do.</p>
      </div>
    </div>
  </div>
</div>