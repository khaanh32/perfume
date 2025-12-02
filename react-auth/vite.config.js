import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'

export default defineConfig({
  plugins: [react()],
  build: {
    // Xuất file build ra thư mục public của PHP
    outDir: '../public/react-dist',
    emptyOutDir: true,
    rollupOptions: {
      output: {
        // Đặt tên cố định để dễ nhúng vào PHP
        entryFileNames: 'auth-LR.js',
        assetFileNames: 'auth-style.css',
      }
    }
  }
})