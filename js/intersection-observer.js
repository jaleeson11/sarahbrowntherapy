const elements = document.querySelectorAll( '.observe' );

const options = {
    root: null,
    threshold: 0.6
};

const observer = new IntersectionObserver( function( entries, observer ) {
    entries.forEach( entry => {
        if( !entry.isIntersecting ) {
            return;
        }
        entry.target.classList.toggle( 'observe--fade-in' );
        observer.unobserve( entry.target ); 
    } )
}, options);

elements.forEach( element => {
    observer.observe( element ); 
} );
