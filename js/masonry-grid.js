( function($) {
    function resizeGridItem( item ) {
        const grid = $( '.testimonials-grid' ),
        rowHeight = parseInt( grid.css( 'grid-auto-rows' ) ),
        rowGap = parseInt( grid.css( 'grid-row-gap' ) ),
        rowSpan = Math.ceil( ( item.querySelector( '.entry-quote' ).getBoundingClientRect().height + rowGap ) / ( rowHeight + rowGap ) );
        item.style.gridRowEnd = 'span ' + rowSpan;
    }

    function resizeAllGridItems(){
        const items = $( 'article.testimonial' );
        items.each( ( index, item ) => {
            resizeGridItem( item )
        } );
    }

    $( window ).load( () => resizeAllGridItems() );
    $( window ).on( 'resize', () => resizeAllGridItems() );
}(jQuery) );