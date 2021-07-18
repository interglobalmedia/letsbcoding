wp.blocks.registerBlockType('apaplugin/are-you-paying-attention', {
    title: 'Are You Paying Attention?',
    icon: 'smiley',
    category: 'common',
    edit: function() {
        return (
            <div>
                <p>Hello, this is a paragraph.</p>
                <h4>Hi there.</h4>
            </div>
        )
    },
    save: function() {
        return (
            <>
                <h3>This is an h3 element.</h3>
                <h4>This is an h4 element.</h4>
            </>
        )
    }
})