<form role="search" method="get" action="<?php echo home_url() ?>">
    <div class="search-assist-container">
        <input 
            type="search" 
            class='form-control' 
            placeholder="Search" 
            value="<?php echo get_search_query(); ?>" 
            name="s" 
            title="search"
        >
        <button class="submit-button mobile-excluded js-submit-button test-desktop-search-button" type="submit" title="Envía tu pregunta">
            <li-icon class="svg-icon " type="search-icon" size="large" tabindex="-1" aria-hidden="true"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="artdeco-icon"><g class="large-icon" style="fill: currentColor">
                <path d="M21,19.67l-5.44-5.44a7,7,0,1,0-1.33,1.33L19.67,21ZM10,15.13A5.13,5.13,0,1,1,15.13,10,5.13,5.13,0,0,1,10,15.13Z"></path>
                </g></svg>
            </li-icon>
        </button>
    </div>
</form>