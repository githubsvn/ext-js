//app.js
/*
Ext.application({
    name: 'AM',

    appFolder: 'app',

    launch: function() {
        Ext.create('Ext.container.Viewport', {
            layout: 'fit',
            items: [
            {
                //xtype: 'userlist',
                xtype: 'panel',
                title: 'Users',
                html : 'List of users will go here'
            }
            ]
        });
    },

    controllers: [
        'Users'
    ]
});
*/

Ext.application({
    name: 'HelloExt',
    launch: function() {
        Ext.create('Ext.panel.Panel', {
            renderTo: Ext.getBody(),
            width: 400,
            height: 200,
            title: 'Container Panel',
            layout: 'column',
            items: [
            {
                xtype: 'panel',
                title: 'Child Panel 1',
                height: 100,
                width: '50%',
                collapsible: true
            },
            {
                xtype: 'panel',
                title: 'Child Panel 2',
                height: 100,
                width: '50%'
            }
            ]
        });
    }
});