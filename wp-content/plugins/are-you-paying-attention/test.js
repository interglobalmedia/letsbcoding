wp.blocks.registerBlockType('apaplugin/are-you-paying-attention', {
    title: 'Are You Paying Attention?',
    icon: 'smiley',
    category: 'common',
    edit: function() {
        return wp.element.createElement('h3', null, 'Hello, this is from the admin editor screen.')
    },
    save: function() {
        return wp.element.createElement('h1', null, 'This is the front end.')
    }
})