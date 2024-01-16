using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Diagnostics;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SingletonPatternCSharp.UploadService
{
    sealed class UploadService
    {
        private UploadService() { }
       
        public int Id
        {
            get;
            private set;
        }

        private static UploadService _instance;
        
        private static readonly object _lock = new object();
        public static UploadService Instance(int id)
        {
            if (null == _instance)
            {
                lock (_lock)
                {
                    if (null == _instance)
                    {
                        _instance = new UploadService();
                        _instance.Id = (id);
                    }
                }
            }

            return _instance;
        }
    }
}
