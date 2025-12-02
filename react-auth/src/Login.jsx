import React, { useState } from 'react';
import axios from 'axios';

const Login = () => {
    const [formData, setFormData] = useState({ username: '', password: '' });
    const [message, setMessage] = useState({ text: '', type: '' });
    const [isLoading, setIsLoading] = useState(false);

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setIsLoading(true);
        setMessage({ text: '', type: '' });

        try {
            // Gọi API PHP
            const response = await axios.post('/web_perfume/auth/api_login', formData);

            if (response.data.status === 'success') {
                setMessage({ text: response.data.message, type: 'success' });
                // Chuyển hướng sau 1s
                setTimeout(() => {
                    window.location.href = response.data.redirect;
                }, 1000);
            } else {
                setMessage({ text: response.data.message, type: 'error' });
                setIsLoading(false);
            }
        } catch (error) {
            setMessage({ text: 'Lỗi kết nối server!', type: 'error' });
            setIsLoading(false);
        }
    };

    return (
        <div className="auth-wrapper">
            <div className="auth-header">
                <h2>Đăng Nhập</h2>
                <p>Chào mừng bạn trở lại với KD Perfume</p>
            </div>

            {message.text && (
                <div className={`alert-message alert-${message.type}`} style={{ marginBottom: '20px' }}>
                    {message.text}
                </div>
            )}

            <form onSubmit={handleSubmit}>
                <div className="form-group-auth">
                    <input 
                        type="text" 
                        name="username" 
                        className="form-control-auth" 
                        placeholder="Email / Tên đăng nhập" 
                        onChange={handleChange} 
                        required 
                    />
                </div>

                <div className="form-group-auth">
                    <input 
                        type="password" 
                        name="password" 
                        className="form-control-auth" 
                        placeholder="Mật khẩu" 
                        onChange={handleChange} 
                        required 
                    />
                </div>

                <button type="submit" className="btn-black" disabled={isLoading}>
                    {isLoading ? 'Đang xử lý...' : 'Đăng nhập'}
                </button>
            </form>

            <div className="auth-footer">
                <span>Bạn chưa có tài khoản?</span>
                <a href="/web_perfume/auth/register">Đăng ký ngay</a>
            </div>
        </div>
    );
};

export default Login;