import React, { useState, useEffect } from 'react';
import Login from './Login';
import Register from './Register';
import './AuthModal.css';

const AuthModal = () => {
    const [isOpen, setIsOpen] = useState(false);
    const [activeTab, setActiveTab] = useState('login'); // 'login' hoặc 'register'

    useEffect(() => {
        // Lắng nghe sự kiện từ bên ngoài (PHP/Javascript thuần)
        const handleOpenEvent = (event) => {
            setIsOpen(true);
            // Nếu sự kiện có truyền tab (login/register) thì mở đúng tab đó
            if (event.detail && event.detail.tab) {
                setActiveTab(event.detail.tab);
            }
        };

        window.addEventListener('open-auth-modal', handleOpenEvent);

        return () => {
            window.removeEventListener('open-auth-modal', handleOpenEvent);
        };
    }, []);

    // Nếu đang đóng thì không render gì cả
    if (!isOpen) return null;

    return (
        <div className="modal-overlay" onClick={() => setIsOpen(false)}>
            {/* stopPropagation để click vào modal không bị đóng popup */}
            <div className="modal-content" onClick={(e) => e.stopPropagation()}>
                
                <button className="close-modal-btn" onClick={() => setIsOpen(false)}>&times;</button>

                {/* Tab chuyển đổi */}
                <div className="modal-tabs">
                    <button 
                        className={`modal-tab ${activeTab === 'login' ? 'active' : ''}`}
                        onClick={() => setActiveTab('login')}
                    >
                        Đăng Nhập
                    </button>
                    <button 
                        className={`modal-tab ${activeTab === 'register' ? 'active' : ''}`}
                        onClick={() => setActiveTab('register')}
                    >
                        Đăng Ký
                    </button>
                </div>

                {/* Nội dung Form */}
                <div className="modal-body">
                    {activeTab === 'login' && <Login />}
                    {activeTab === 'register' && <Register />}
                </div>
            </div>
        </div>
    );
};

export default AuthModal;