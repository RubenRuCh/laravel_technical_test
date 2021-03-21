import React from "react";
import ReactDOM from "react-dom";
import {
    AwesomeButtonProgress,
    AwesomeButtonSocial,
} from "react-awesome-button";
import "react-awesome-button/src/styles/styles.scss";

class Welcome extends React.Component {
    constructor() {
        super();
        this.state = { showSocial: false, progressIsDisabled: false };
    }

    _showSocial = (bool) => {
        this.setState({
            showSocial: bool,
        });
    };

    _progressIsDisabled = (bool) => {
        this.setState({
            progressIsDisabled: bool,
        });
    };

    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div
                                className="card-body"
                                style={{ textAlign: "center" }}
                            >
                                <AwesomeButtonProgress
                                    loadingLabel="Wait for it.."
                                    resultLabel="Done!"
                                    size="large"
                                    type="primary"
                                    disabled={this.state.progressIsDisabled}
                                    action={(element, next) => {
                                        setTimeout(() => {
                                            this._showSocial(true);
                                            next();
                                            this._progressIsDisabled(true);
                                        }, 1000);
                                    }}
                                >
                                    Show developer's data!
                                </AwesomeButtonProgress>

                                {this.state.showSocial && (
                                    <div id="socialButtons">
                                        <AwesomeButtonSocial
                                            type="linkedin"
                                            url="https://www.linkedin.com/in/%F0%9F%96%A5-rub%C3%A9n-r-80003b16a/"
                                        >
                                            Linkedin
                                        </AwesomeButtonSocial>

                                        <AwesomeButtonSocial
                                            type="github"
                                            target="_blank"
                                            href="https://github.com/RubenRuCh"
                                        >
                                            Github
                                        </AwesomeButtonSocial>

                                        <AwesomeButtonSocial
                                            type="whatsapp"
                                            phone="+34635810961"
                                        >
                                            Whatsapp
                                        </AwesomeButtonSocial>
                                    </div>
                                )}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Welcome;

if (document.getElementById("welcome")) {
    ReactDOM.render(<Welcome />, document.getElementById("welcome"));
}
