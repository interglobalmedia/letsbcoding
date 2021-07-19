import './index.scss'
import { TextControl, Flex, FlexBlock, FlexItem, Button, Icon } from '@wordpress/components'

wp.blocks.registerBlockType('aypaplugin/are-you-paying-attention', {
    title: 'Are You Paying Attention?',
    icon: 'smiley',
    category: 'common',
    attributes: {
        skyColor: {
            type: 'string'
        },
        grassColor: {
            type: 'string'
        }
    },
    edit: EditComponent,
    save: function(props) {
        return null
    }
})

function EditComponent (props) {
    function updateSkyColor(e) {
        props.setAttributes({
            skyColor: e.target.value
        })
    }
    function updateGrassColor(e) {
        props.setAttributes({
            grassColor: e.target.value
        })
    }
    return (
        <div className="paying-attention-edit-block">
            <TextControl label="Question:" style={{fontSize: '1.25rem'}} />
            <p style={{fontSize: '13px', margin: '20px 0 8px 0'}}>Answers:</p>
            <Flex>
                <FlexBlock>
                    <TextControl/>
                </FlexBlock>
                <FlexItem>
                    <Button>
                        <Icon className="mark-as-correct" icon="star-empty"/>
                    </Button>
                </FlexItem>
                <FlexItem>
                    <Button isLink className="attention-delete">Delete</Button>
                </FlexItem>
            </Flex>
            <Button isPrimary>Add another answer</Button>
        </div>
    )
}