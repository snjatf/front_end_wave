var Task = React.createClass({
    getInitialState: function () {
        ReactDOM.render(
            <TaskDetail data={this.props.data}></TaskDetail>,
            document.getElementById("task_detail")
        );
        return { data: [] };
    },
    openTaskDetail: function () {
        
    },
    render: function () {
        return (
            <a href="#" className="list-group-item" data-toggle="modal" data-target="#myModal" onClick={this.openTaskDetail}>
                <font fontSize="16px">{this.props.index}.</font>
                {this.props.task_name}
            </a>
        );
    }
});

var TaskList = React.createClass({
    getInitialState: function () {
        return { data: [] };
    },
    loadTaskFromServer: function () {
        $.ajax({
            url: this.props.url + "getTask",
            dataType: 'json',
            cache: false,
            success: function (data) {
                this.setState({ data: data });
            }.bind(this),
            error: function (xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }.bind(this)
        });
    },
    componentDidMount: function () {
        this.loadTaskFromServer();
        // setInterval(this.loadTaskFromServer, this.props.pollInterval);
    },
    render: function () {
        var taskItems = this.state.data.map(function (task, n) {
            return (
                <Task index={n + 1} task_id={task.task_id} type={task.type} task_name={task.task_name} data={task}>
                </Task>
            );
        });
        return (
            <div className="list-group">
                {taskItems}
            </div>
        );
    }
});

var TaskDetail = React.createClass({    
    render: function () {
        var data=this.props.data;
        console.info(data);
        return (
            <div className="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div className="modal-dialog" role="document">
                    <div className="modal-content">
                        <div className="modal-header">
                            <button type="button" className="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times; </span></button>
                            <h4 className="modal-title" id="myModalLabel">{data.task_id}</h4>
                        </div>
                        <div className="modal-body">
                            {data.task_name}
                        </div>
                        <div className="modal-footer">
                            <button type="button" className="btn btn-primary">确定</button>
                            <button type="button" className="btn btn-default" data-dismiss="modal">取消</button>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
});


ReactDOM.render(
    <TaskList url="services/service.php?opr=" pollInterval={1000 * 10}></TaskList>,
    document.getElementById("task")
);

