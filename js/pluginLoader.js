function facebook(plugin, targetId)
{
    this.plugin     = plugin;
    this.targetId   = targetId;
    this.pluginArray= [
        'likebutton'
    ];
    this.isInArray = function (str,arr)
    {
        for(p=0; p < arr.length; p++)
        {
            if (str == arr[p])
            {
                return true;
            }
        }
        return false;
    };
    this.init = function()
    {
        if(this.isInArray(this.plugin, this.pluginArray))
        {
            eval((this.plugin)+"Load('"+(this.targetId)+"')");
        }
        else
        {
            alert('Plugin "'+this.plugin+'" dont exists!');
            this.plugin = '';
            return false;
        }
    };
    this.init();
}
if (typeof socialnetwork !== 'object' || socialnetwork == null) {
    socialnetwork = {};
    socialnetwork.facebook = [];
}
function loadFacebookPlugin(pluginName, targetId)
{
    socialnetwork.facebook[pluginName] = new facebook(pluginName, targetId);
}