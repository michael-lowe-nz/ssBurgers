<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
    <article>
        <h1>$Title</h1>
        </h2>
        <div class="content">$Content</div>
        <div class="menu-items">
            <% loop $MenuItems %>
                <% include MenuItem %>
            <% end_loop %>
        </div>
        $Photo.SetWidth(100)
    </article>
    $Layout
    $Form
    $CommentsForm
    <h3>Our Suppliers:</h3>
    <div>
        <% loop $Suppliers %>
            <li>$Name, $Location</li>
        <% end_loop %>
    </div>
</div>