@extends('admin.master')

@section('content')

<section id="cart_items" class="mx-auto my-5 shadow-sm col-8">

        <div class="card-header">
            <h3>
                    <span style="color:green"> PATCH NOTES </span>, 
                    Welcome
                </h3>
            </div>
           
            <div class="table-responsive">
                <table border="0" cellpadding="1" cellspacing="1" class="general-table" style="width:100%">
                    <tbody>
                        <tr>
                            <th>v1.0</th>
                            <th>10.18.2020</th>
                        </tr>
                        <tr>
                            <td>New</td>
                            <td>
                            <ul>
                                <li>New department homepages</li>
                                <li><a href="https://pittsburghpa.gov/publicsafety/blotterview.html">Media Blotter</a></li>
                                <li><a href="https://pittsburghpa.gov/pli/fee-calculator">PLI Fee Calculator</a></li>
                            </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Improvements</td>
                            <td>
                            <ul>
                                <li>All department/office/council homepages have new layouts</li>
                                <li>More accessible primary navigation system implmented</li>
                                <li>Quick search field added to the top right of all subpages</li>
                                <li>Pittsburgh logo swapped out for a more traditional version</li>
                                <li>Larger collection of links added to footer</li>
                                <li><a href="https://pittsburghpa.gov/city-info/soicalmedia">Social Media Hub</a> created</li>
                                <li>Misc. tweaks and module changes included but not limited to buttons, text alignment, revamped announcement boxes, revamped Press Releases landing page, new accordion style dropdowns on subpages and various other improvements</li>
                            </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Fixes</td>
                            <td>
                            <ul>
                                <li>Cleaned up unecessary javascript and consolidation of scripts/code</li>
                                <li>Many fixes on the back-end including module upgrades to our home-bulit Content Management System</li>
                            </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Known Issues</td>
                            <td>
                            <ul>
                                <li>City homepage slow loading</li>
                            </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Upcoming</td>
                            <td>
                            <ul>
                                <li>Small revamp to the top half section of city homepage</li>
                                <li>Re-writing of meeting modules front and back-end</li>
                                <li>Mayor's Cabinet Page</li>
                            </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            

</section>

@endsection
 